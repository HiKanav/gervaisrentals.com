@extends('admin.layout.list')

@section('title') Quotes @stop

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
            <th> Actions </th>
        </tr>
    </thead>
    <tbody>
        @foreach($quotes as $quote)
			<tr>
                <td> <a href="{{action('Front\PageController@getPrintQuote', [$quote->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom">{{ $quote->id }} </a></td>
                <td> {{ $quote->name }} </td>
                <td> {{ $quote->email }} </td>
                <td> {{ $quote->phone }} </td>
                <td> {{ $quote->company_name }} </td>
                <td> {{ $quote->event_at }} </td>
                <td> {{ $quote->created_at }} </td>
                <td>
                	@if($quote->has_products)
                        Contacted Us
                        {{-- <div class="margin-bottom-5">
                            <a href="{{action('Front\PageController@getPrintQuote', [$quote->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Products</a>
                        </div> --}}
                    @else
                    	Requested For Quote
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