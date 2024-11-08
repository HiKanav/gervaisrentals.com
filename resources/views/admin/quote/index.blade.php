@extends('admin.layout.list')

@section('title') Quotes @stop

@section('page-level-css')
    <style type="text/css">
        .modal-header {
            display: flex;
            justify-content:space-between;
        }

        .close-button {
            font-size: 3.5rem;
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
            align-self: center;
            padding: 1rem;
            margin: -1rem -1rem -1rem auto;
            float: right;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .modal-dialog {
            width: fit-content;
            margin: 0px auto;
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }
        
        .modal-title {
            font-size: 20px;
            font-weight: 600;
        } 

        .modal-header:before {
            content: none;
        }
        .modal-header:after {
            content: none;
        }

        .modal-content {
            width: max-content;
            min-width: 400px;
            min-height: 300px;
        }
    </style>
@stop

@php

    function fetchQueryParam($metrics)
    {
        $queryParams = array_diff_key($metrics, ['source_referrer' => true, 'ip' => true, 'anycast' => true, 'hostname' => true, 'bogon' => true, 'city' => true, 'region' => true, 'country' => true, 'loc' => true, 'postal' => true, 'timezone' => true, 'org' => true, 'readme' => true]);
        if(count($queryParams) == 1 && isset($queryParams['source'])) return [];
        return $queryParams;
    }

    function attachQueryParams($queryParams, $referrerDomain)
    {
        $formattedPairs = array_map(function($key, $value) {
            return $key . '=' . $value . '&';
        }, array_keys($queryParams), $queryParams);

        return $referrerDomain . '?' . rtrim(implode('', $formattedPairs), '&');
    }

    function fetchLocationDetails($metrics) 
    {
        return array_intersect_key($metrics, array_flip(['ip', 'city', 'region', 'country', 'loc', 'postal', 'timezone', 'anycast', 'hostname']));
    }

    function getKeyValue($obj)
    {
        return (key($obj) . ': ' . substr(current($obj), 0, 25));
    }

    function getLeadTypes()
    {
        return [
            'Google' => [
                'urls' => ['www.google.com', 'syndicatedsearch.goog', 'www.google.ca'],
                'possible_matches' => ['gclid', 'keyword']
            ],
            'Instagram' => [
                'urls' => ['l.instagram.com'],
                'possible_matches' => ['fbclid']
            ],
            'Bing' => [
                'urls' => ['www.bing.com']
            ],
        ];
    }

    function getLeadType($sourceReferrer, $queryParams)
    {
        $leadTypes = getLeadTypes();

        $domain = $sourceReferrer ? parse_url($sourceReferrer, PHP_URL_HOST) : '';

        return array_reduce(array_keys($leadTypes), function($carry, $key) use ($leadTypes, $domain) {
            return $carry ?: ((in_array($domain, $leadTypes[$key]['urls']) || in_array('www.' . $domain, $leadTypes[$key]['urls'])) ? $key : null);
        }, null);

    }

    function checkDomainForAdParams($queryParams, $array = []) {
        return count(array_filter($array, function($value, $key) use ($array, $queryParams) {
                return isset($queryParams[$value]);
            }, ARRAY_FILTER_USE_BOTH));
    }

    function formatOutput($leadType, $location, $referrerDomain = null, $adParam = null)
    {
        return collect(["Lead Type: " . $leadType, $location, ( $referrerDomain ? "Referrer: " . (substr($referrerDomain, 0, 25)) : null ), $adParam])
            ->filter()
            ->implode('</br>');
    }

    function formatLabel($value) 
    {
        $sourceReferrer = $value['source_referrer'] ?? $value['source'] ?? null;
        
        $locationDetails = fetchLocationDetails($value);

        $location = !empty($locationDetails) ? (isset($locationDetails['city']) ? 'City: ' . $locationDetails['city'] : getKeyValue($locationDetails)) : '';

        $queryParams = fetchQueryParam($value);

        $domain = $sourceReferrer ? ( parse_url($sourceReferrer, PHP_URL_HOST) ?? $sourceReferrer ) : '';

        $lead = getLeadType($sourceReferrer, $queryParams);

        $referrerDomain = $lead ?? $sourceReferrer;

        // if(count($queryParams) == 0 && isset($value['source'])) return collect(["Lead Type: Organic Lead", $location, "Referrer: " . ( substr($referrerDomain, 0, 25) ?? 'Not Captured')])->filter()->implode('</br>'); 

        if (is_null($sourceReferrer) && empty($queryParams)) {
            return formatOutput('Direct Lead', $location);
        }

        if (!empty($queryParams)) {
            $adParam = array_key_exists('keyword', $queryParams) 
                ? 'Keyword: ' . $value['keyword'] 
                : getKeyValue($queryParams);

            $adLeadType = checkDomainForAdParams($queryParams, $lead ? getLeadTypes()[$lead]['possible_matches'] : []) ? $lead : 'Unknown';

            $leadType = ($queryParams['utm_campaign'] ?? '') === 'local' && $lead == 'Google' ? 'Google My Business' : $adLeadType . ' Ads';

            return formatOutput($leadType, $location, $referrerDomain, $adParam);
        }

        return formatOutput('Organic Lead', $location, $referrerDomain);
    }
@endphp

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\QuoteController@index')}}">Quotes</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All</span>
    </li>
@stop

@section('subject') Quotes @stop

@section('table-content')
    <thead>
        <tr>
            <th> Quote Id </th>
            <th> Name </th>
            <th> Email </th>
            <th> Phone </th>
            <th> Company Name </th>
            <th> Event Date </th>
            <th> Quote Date </th>
            <th> Metrics </th>
            <th> Actions </th>
        </tr>
    </thead>
    <tbody>
        @foreach($quotes as $key => $quote)
			<tr>
                <td> <a href="{{action('Front\PageController@getPrintQuote', [$quote->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom">{{ $quote->id }} </a></td>
                <td> {{ $quote->name }} </td>
                <td> {{ $quote->email }} </td>
                <td> {{ $quote->phone }} </td>
                <td> {{ $quote->company_name }} </td>
                <td> {{ $quote->event_at }} </td>
                <td> {{ $quote->created_at }} </td>
                <td>
                    @if ($quote->seo_metrics)
                    <div style="text-align: start;">
                        <a data-toggle="modal" data-target="#modal_{{ $key }}" style="font-size: 14px;">
                            {{-- {{ $quote->seo_metrics['keyword'] ?? $quote->seo_metrics['city'] ?? array_values($quote->seo_metrics)[0] }} --}}
                            {!! formatLabel($quote->seo_metrics) !!}
                        </a>
                        @else NULL
                        @endif
                    </div>

                    <div class="modal fade" id="modal_{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
                    role="dialog" >
                        <div class="modal-dialog rental-service rounded bg-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="align-self:center;">Quotes</h5>
                                    <button type="button" class="close-button" data-dismiss="modal" aria-label="Close" style="align-self: center;">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="max-height: 60vh; overflow-y: scroll;">
                                    @if ($quote->seo_metrics)

                                        @php
                                            $locationDetail = fetchLocationDetails($quote->seo_metrics);
                                            $queryParam = fetchQueryParam($quote->seo_metrics);
                                        @endphp

                                        @if (count($locationDetail))
                                            <strong><p class="mb-0 text-center">Location Details</p></strong>
                                            <hr class="mt-1">
                                        @endif
                                        @foreach ($locationDetail as $key => $location)
                                            @if (isset($quote->seo_metrics[$key]))
                                                <p style="display: flex;"><strong>{{ ucfirst($key) }}:  &nbsp;</strong> {{ $location }}</p>
                                            @endif    
                                        @endforeach

                                        @if (isset($quote->seo_metrics['source_referrer']) || ( ( count($queryParam) == 0) && isset($quote->seo_metrics['source']) ) )
                                            <hr class="mt-1">
                                            <strong><p class="mb-0 text-center">Referrer Details</p></strong>
                                            <hr class="mt-1">
                                            <div style="display: flex;"><strong>Referrer Domain: &nbsp;&nbsp;</strong>
                                                <p>
                                                    {{  $quote->seo_metrics['source_referrer'] }}
                                                </p> 
                                            </div>
                                            <div style="display: flex;"><strong>Referrer Url: &nbsp;&nbsp;</strong>
                                                <p style="width: 140ch; word-wrap: break-word; white-space: normal;">
                                                    {{ attachQueryParams($queryParam, $quote->seo_metrics['source_referrer']) }}
                                                </p> 
                                            </div>
                                            <hr class="mt-1">
                                        @endif

                                        @if (count($queryParam))
                                            <strong><p class="mb-0 text-center">Details Received in URL</p></strong>
                                            <hr class="mt-1">
                                        @endif
                                        @foreach ($queryParam as $key => $value)
                                            <p style="display: flex;"><strong>{{ ucfirst($key) }}:  &nbsp;</strong> {{ $value }}</p>
                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                	@if($quote->has_products)
                        Requested For Quote
                        {{-- <div class="margin-bottom-5">
                            <a href="{{action('Front\PageController@getPrintQuote', [$quote->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Products</a>
                        </div> --}}
                    @else
                        Contacted Us 
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        {{ $quotes->links() }}
    </tfoot>
@stop

@section('page-level-js')
	{{-- <script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script> --}}
@stop