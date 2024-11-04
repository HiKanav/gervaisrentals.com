@extends('admin.layout.list')

@section('title') Categories @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\CategoryController@index')}}">Categories</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All</span>
    </li>
@stop

@section('subject') Categories @stop

@section('extra-btn')
	<a href="{{action('Admin\CategoryController@create')}}" class="btn purple-sharp btn-outline sbold uppercase">New</a>
@stop

@section('table-content')
	<thead>
	    <tr>
	        <th> Category Id </th>
	        <th> Name </th>
	        <th> Description </th>
	        <th> Thumbnail </th>
	        <th> Sort Order </th>
	        <th> Active </th>
	        <th> Actions </th>
	    </tr>
	</thead>
	<tbody>
	    @foreach($categories as $category)
			<tr>
	            <td> {{ $category->id }} </td>
	            <td> {{ $category->name }} </td>
	            <td> {{ str_limit($category->description, $limit = 50, $end = '...') }} </td>
	            <td> <img src="{{asset($categoryLocation."/".$category->thumbnail_location)}}" class="img-responsive small-thumbnail"> </td>
	            <td> {{ $category->sort_order }} </td>
	            <td> {{ $category->active ? 'Y' : 'N' }} </td>
	            <td>
	                <div class="margin-bottom-5">
	                    <a href="{{action('Admin\CategoryController@edit', [$category->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
	                </div>
	                {!!Form::open(['action' => ['Admin\CategoryController@destroy', $category->id], 'method' => 'DELETE'])!!}
	                	{!!Form::submit('Delete', ['class' => 'btn btn-sm red btn-outline filter-cancel', 'onclick' => 'return confirm("Are you sure?")'])!!}
	                {!!Form::close()!!}
	            </td>
	        </tr>
	    @endforeach
	</tbody>
@stop
{{--
@section('tfoot')
    <div class="pull-left">
		Showing {{$categories->firstItem()}} to {{$categories->lastItem()}} of {{$categories->total()}} entries
    </div>
    <div class="pull-right">
    	{!! $categories->links() !!}
    </div>
    <div class="clearfix"></div>
@stop
--}}

@section('page-level-js')
	<script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script>
@stop