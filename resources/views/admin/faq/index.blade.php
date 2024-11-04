@extends('admin.layout.list')

@section('title') FAQs @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\FaqController@index')}}">FAQs</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All</span>
    </li>
@stop

@section('subject') FAQs @stop

@section('extra-btn')
	<a href="{{action('Admin\FaqController@create')}}" class="btn purple-sharp btn-outline sbold uppercase">New</a>
@stop

@section('table-content')
	<thead>
	    <tr>
	        <th> Faq Id </th>
	        <th> Question </th>
	        <th> Answer </th>
	        <th> Sort Order </th>
	        <th> Active </th>
	        <th> Actions </th>
	    </tr>
	</thead>
	<tbody>
	    @foreach($faqs as $faq)
			<tr>
	            <td> {{ $faq->id }} </td>
	            <td> {{ str_limit($faq->question, $limit = 50, $end = '...') }} </td>
	            <td> {{ str_limit($faq->answer, $limit = 50, $end = '...') }} </td>
	            <td> {{ $faq->sort_order }} </td>
	            <td> {{ $faq->active ? 'Y' : 'N' }} </td>
	            <td>
	                <div class="margin-bottom-5">
	                    <a href="{{action('Admin\FaqController@edit', [$faq->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
	                </div>
	                {!!Form::open(['action' => ['Admin\FaqController@destroy', $faq->id], 'method' => 'DELETE'])!!}
	                	{!!Form::submit('Delete', ['class' => 'btn btn-sm red btn-outline filter-cancel', 'onclick' => 'return confirm("Are you sure?")'])!!}
	                {!!Form::close()!!}
	            </td>
	        </tr>
	    @endforeach
	</tbody>
@stop

@section('page-level-js')
	<script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script>
@stop