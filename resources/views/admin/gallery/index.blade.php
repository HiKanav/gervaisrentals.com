@extends('admin.layout.list')

@section('title') Gallery @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\GalleryController@index')}}">Gallery</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All Images</span>
    </li>
@stop

@section('subject') Gallery @stop

@section('extra-btn')
	 <a href="{{action('Admin\GalleryController@create')}}" class="btn purple-sharp btn-outline sbold uppercase">New</a>
@stop

@section('table-content')
	<thead>
	    <tr>
	        <th> Gallery Id </th>
	        <th > Image </th>
	        <th> Sort Order </th>
	        <th> Active </th>
	        <th> Actions </th>
	    </tr>
	</thead>
	<tbody>
	    @foreach($galleryImages as $image)
			<tr>
	            <td> {{ $image->id }} </td>
	            <td> <img src="{{asset($galleryLocation.'/'.$image->main_location)}}" class="img-responsive small-thumbnail"> </td>
	            <td> {{ $image->sort_order }} </td>
	            <td> {{ $image->active ? 'Y' : 'N' }} </td>
	            <td>
	                <div class="margin-bottom-5">
	                    <a href="{{action('Admin\GalleryController@edit', [$image->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
	                </div>
	                {!!Form::open(['action' => ['Admin\GalleryController@destroy', $image->id], 'method' => 'DELETE'])!!}
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