@extends('admin.layout.list')

@section('title') Products @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ProductController@index')}}">Products</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All</span>
    </li>
@stop

@section('subject') Products @stop

@section('extra-btn')
	<a href="{{action('Admin\ProductController@create')}}" class="btn purple-sharp btn-outline sbold uppercase">New</a>
@stop

@section('table-content')
	<thead>
	    <tr>
	        <th> Product Id </th>
	        <th> Name </th>
	        <th> Description </th>
	        <th> Thumbnail </th>
	        <th> Sort Order </th>
	        <th> Active </th>
	        <th> Actions </th>
	    </tr>
	</thead>
	<tbody>
	    @foreach($products as $product)
			<tr>
	            <td> {{ $product->id }} </td>
	            <td> {{ str_limit($product->name, $limit = 50, $end = '...') }} </td>
	            <td> {{ str_limit($product->description, $limit = 50, $end = '...') }} </td>
	            <td> <img src="{{asset($productLocation.'/'.$product->thumbnail_location_1)}}" class="img-responsive small-thumbnail"> </td>
	            <td> {{ $product->sort_order }} </td>
	            <td> {{ $product->active ? 'Y' : 'N' }} </td>
	            <td>
	                <div class="margin-bottom-5">
	                    <a href="{{action('Admin\ProductController@edit', [$product->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
	                </div>
	                {!!Form::open(['action' => ['Admin\ProductController@destroy', $product->id], 'method' => 'DELETE'])!!}
	                	{!!Form::submit('Delete', ['class' => 'btn btn-sm red btn-outline filter-cancel', 'onclick' => 'return confirm("Are you sure?")'])!!}
	                {!!Form::close()!!}
	            </td>
	        </tr>
	    @endforeach
	</tbody>
@stop

@section('tfoot')
	{{--
	<div class="pull-left">
		Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} entries
	</div>
	<div class="pull-right">
		{!! $products->links() !!}
	</div>
	<div class="clearfix"></div>
	--}}
@stop

@section('page-level-js')
	<script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script>
@stop