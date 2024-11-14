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
    $showMetricsColumn = session()->get('superAdminCode') == env('SUPER_ADMIN_CODE');

    function fetchQueryParam($metrics)
    {
        $queryParams = array_diff_key($metrics, ['source_referrer' => true, 'entry_url' => true,  'ip' => true, 'anycast' => true, 'hostname' => true, 'bogon' => true, 'city' => true, 'region' => true, 'country' => true, 'loc' => true, 'postal' => true, 'timezone' => true, 'org' => true, 'readme' => true]);
        if(count($queryParams) == 1 && isset($queryParams['source'])) return [];
        return $queryParams;
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
            'DuckDuckGo' => [
                'urls' => ['duckduckgo.com']
            ],
            'Yahoo' => [
                'urls' => ['nz.search.yahoo.com']
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

            $leadType = ($queryParams['utm_campaign'] ?? '') === 'local' && $lead == 'Google' ? 'GMB' : $adLeadType . ' Ads';

            return formatOutput($leadType, $location, $referrerDomain, $adParam);
        }

        return formatOutput('Organic Lead', $location, $referrerDomain);
    }
@endphp

@if ($showMetricsColumn)
    @section('portlet_header')
        <div style="display: flex;justify-content:space-between;">
            <div  id="ordersPast6Months" style="height: 370px; width: 100%;max-width: 50%;"></div>
            <div  id="ordersPast60Days" style="height: 370px; width: 100%;max-width: 50%;"></div>
            <span id="timeToRender"></span>
        </div>
    @stop
@endif


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

@section('portlet_body')
    <div id="date_filter" style="display: none;">
        {!! Form::open(['method' => 'GET', 'route' => 'admin.quote.index', 'id' => 'form']) !!}
        <div style="display: flex;justify-content:start;gap: 30px;">
            <div class="form-group">
                <label for="start_date">From: </label>
                {!! Html::form_field_with_icon('calendar', Form::date('start_date', old('start_date', $startDate), ['class' => 'form-control', 'placeholder' => 'Start Date', 'id' => 'start_date', 'required' => 'required'])) !!}
            </div>

            <div class="form-group" >
                <label for="end_date">To: </label>
                {!! Html::form_field_with_icon('calendar', Form::date('end_date', old('end_date', $endDate), ['class' => 'form-control', 'placeholder' => 'End Date', 'id' => 'end_date', 'required' => 'required'])) !!}
            </div>

            <div style="align-self: center; margin-bottom: 6px;">
                <button type="submit" class="btn btn-primary">Filter</button>
                @if($hasDateParams)
                    <a id="clear" class="small text-primary ml-2 cursor-pointer" style="align-self: center;margin-left: 15px;">Clear filter</a>
                @endif    
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

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
            @if ($showMetricsColumn)
                <th> Metrics </th>
            @endif
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
                <td class="dates"> {{ $quote->created_at }} </td>
                @if ($showMetricsColumn)
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
                                                $isSourceReferrer = isset($quote->seo_metrics['source_referrer']) || ( ( count($queryParam) == 0) && isset($quote->seo_metrics['source']));
                                                $referrerDomain = $isSourceReferrer ? ( $quote->seo_metrics['source_referrer'] ?? $quote->seo_metrics['source'] ) : '';
                                                $fullUrl = $quote->seo_metrics['entry_url'] ?? 'NULL';
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

                                            @if ($isSourceReferrer)
                                                <hr class="mt-1">
                                                <strong><p class="mb-0 text-center">Referrer Details</p></strong>
                                                <hr class="mt-1">
                                                <div style="display: flex;margin-bottom: 20px;"><strong>Referrer Domain: &nbsp;</strong>
                                                    <a style="max-inline-size: 140ch; word-break: break-all; text-align: start;" href="{{ $referrerDomain }}" target="_blank">
                                                        {{ $referrerDomain }}
                                                    </a> 
                                                </div>
                                                <div style="display: flex; margin-bottom: 20px;"><strong>Landing URL: &nbsp;</strong>
                                                    @if($fullUrl !== 'NULL')
                                                        <a style="max-inline-size: 140ch; word-break: break-all; text-align: start;" href="{{ $fullUrl }}" target="_blank">
                                                            {{ $fullUrl }}
                                                        </a>
                                                    @else
                                                        NULL
                                                    @endif
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
                @endif
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
@stop

@section('tfoot')
    <tfoot>
        <div id="paginate">
            {{ $quotes->appends(request()->query())->links() }}
        </div>
    </tfoot>
@stop

@section('page-level-js')
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

    <script>

        var test = JSON.parse('{!! json_encode($showMetricsColumn) !!}');

            $('#form').on('submit', function(event) {
                event.preventDefault();

                $('<input>', {
                    type: 'hidden',
                    id: 'timezone',
                    name: 'timezone',
                    value: Intl.DateTimeFormat().resolvedOptions().timeZone
                }).appendTo('form');

                this.submit();
            })

        function preserveScrollPosition() {
            var scrollPos = sessionStorage.getItem('scrollPos');
            if (scrollPos) {
                $(window).scrollTop(scrollPos);
            }

            $(document).on('click', '.pagination a, button', function() {
                sessionStorage.setItem('scrollPos', $(window).scrollTop());
            });
        }

        $( document ).ready(function() {

            preserveScrollPosition()

            var table = $('.table').DataTable({searching: false, paging: false, info: false});

            $('#list_filter').parent().prev().append($('#date_filter'))
            $('#date_filter').show()

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = new Date($('#min').val());
                    var max = new Date($('#max').val());
                    var date = new Date(data[5]);

                    if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && date <= max) ||
                        (min <= date && isNaN(max)) ||
                        (min <= date && date <= max)) {
                        return true;
                    }
                    return false;
                }
            );

            $('#clear').click(function() {
                $('#start_date').val('')
                $('#end_date').val('')
                $('#clear').css('visibility', 'hidden')
                
                window.history.pushState({}, document.title, window.location.pathname);

                $.ajax({
                    url: $('#form').attr('action'),
                    method: 'GET',
                    data: $('#filter-form').serialize(),
                    success: function(response) {
                        const dateFilter = $('#date_filter');
                        table.destroy();
                        $('#category_index').html($(response).find('#category_index').html());
                        $('#paginate').html($(response).find('#paginate').html());
                        $('#category_index').DataTable({
                            searching: false,
                            paging: false, 
                            info: false,
                            drawCallback: function (settings) {
                                $('#list_filter').parent().prev().append(dateFilter)
                            },
                        })
                    }
                });
            });
        });

        const monthNames = {
            '1': 'January',
            '2': 'February',
            '3': 'March',
            '4': 'April',
            '5': 'May',
            '6': 'June',
            '7': 'July',
            '8': 'August',
            '9': 'September',
            '10': 'October',
            '11': 'November',
            '12': 'December'
        };

        const formatDate = (date, format = 'YYYY-M-DD') => {
            date = new Date(date) 
            const options = {hourCycle: 'h23', year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
            const parts = new Intl.DateTimeFormat('en-US', options).formatToParts(date);
            const partValues = parts.reduce((acc, { type, value }) => ({ ...acc, [type]: value }), {});
            
            return format
                .replace('YYYY', partValues.year)
                .replace('M', partValues.month)
                .replace('DD', partValues.day)
                .replace('HH', partValues.hour)
                .replace('mm', partValues.minute)
                .replace('ss', partValues.second);
        };

        const getShortDate = (date) => {
            const day = date.split('-')[2]
            const month = monthNames[date.split('-')[1]]
            return day + ' ' + month.slice(0,3)
        }

        var dates = JSON.parse('{!! json_encode($dates) !!}');

        dates = dates.map((date) => (formatDate(date + ' UTC', 'YYYY-M-DD')))

        const pastDates = (dates, count) => {
            return [
                ...dates, 
                ...Array.from({ length: count }, (_, i) => formatDate(new Date(new Date().setDate(new Date().getDate() - i))))
            ]
        }

        $('.dates').each(function(index, item) {
            const date = new Date(item.innerText + ' UTC')
            $(item).text(formatDate(date, 'YYYY-M-DD HH:mm:ss'))
        })

        function pastDaysOrMonths(duration, type) { 
            const today = new Date();            
            const date = new Date(today);

            if(type == 'days') return date.setDate(today.getDate() - duration)

            else if(type == 'months') return today.setMonth(today.getMonth() - duration)
            
            else return date.setFullYear(today.getFullYear() - duration)
        }

        function groupAndFilterGraphdata(data, filterCondition, format = 'YYYY-M-DD', label = false) {

                return _.chain(data)
                    .groupBy((data) => {
                        if(label) return data
                        else return formatDate(data, format)
                    })
                    .mapValues((item, i) => {
                        return {
                            ...(label ? { label: item[0] } : { x: new Date(i) }),
                            y: item.length - (format === 'YYYY-M' ? 0 : 1)
                        };
                    })
                    .filter((item, i) =>  {
                        const date = item.x ?? item.label;
                        return new Date(date) > filterCondition
                    })
                    .sort((a,b)=>  {
                        const firstItem = a.label ?? a.x;
                        const secondItem = b.label ?? b.x;
                        return new Date(firstItem) - new Date(secondItem);

                    })
                    .value()
        }

        var orderPast6Months = new CanvasJS.Chart("ordersPast6Months",
            {
                title:{
                    text: "Orders of Last 24 Months"
                },
                dataPointMaxWidth: 80,
                toolTip: {
                    shared: true,
                    contentFormatter: function (e) {
                        return new Date(e.entries[0].dataPoint.x).toLocaleString('default', { month: 'long' }) + ': ' + e.entries[0].dataPoint.y
                    }
                },

                axisX:{
                    title: "timeline",
                    labelAutoFit: true,
                    interval: 1,
                    intervalType: "month",
                    labelFormatter: function (e) {
                        return CanvasJS.formatDate( e.value, "MMM");
                    },
                },
                axisY: {
                    title: "Orders"
                },
                data: [
                    {        
                        type: "column",
                        dataPoints: groupAndFilterGraphdata(dates,  pastDaysOrMonths(24, 'months'), 'YYYY-M'),
                        
                    }
                ]
            }
        );

        var ordersPast60Days = new CanvasJS.Chart("ordersPast60Days",
            {
                title:{
                    text: "Orders of Last 120 days"
                },
                dataPointMaxWidth: 20,

                axisX:{
                    title: "timeline",
                    labelAutoFit: true,
                    interval: 0,
                    labelFormatter: function(e) {
                        return CanvasJS.formatDate(e.label, "MMM DD")
                    }

                },
                toolTip: {
                    shared: true,
                    contentFormatter: function (e) {
                       return getShortDate(e.entries[0].dataPoint.label) + ": " + e.entries[0].dataPoint.y
                    }
                },

                axisY: {
                    title: "Orders",
                    gridThickness: 1, 
                },
                data: [
                    {        
                        type: "column",
                        dataPoints: groupAndFilterGraphdata(pastDates(dates, 120), pastDaysOrMonths(120, 'days'), 'YYYY-M-DD', true)
                    }
                ]
            }
        );

        orderPast6Months.render();
        ordersPast60Days.render();
    </script>

	{{-- <script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script> --}}
@stop