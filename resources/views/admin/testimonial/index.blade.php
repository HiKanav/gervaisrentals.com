@extends('admin.layout.list')

@section('title') Testimonials @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\TestimonialController@index')}}">Testimonials</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>All</span>
    </li>
@stop

@section('subject') Testimonials @stop

@section('extra-btn')
	<a href="{{action('Admin\TestimonialController@create')}}" class="btn purple-sharp btn-outline sbold uppercase">New</a> 
@stop

@section('table-content')
	<thead>
	    <tr>
	        <th> Tentimonial Id </th>
	        <th> Description </th>
	        <th> Thumbnail </th>
	        <th> Sort Order </th>
	        <th> Active </th>
	        <th> Actions </th>
	    </tr>
	</thead>
	<tbody>
	    @foreach($testimonials as $testimonial)
			<tr>
	            <td> {{ $testimonial->id }} </td>
	            <td> {{ $testimonial->description }} </td>
	            <td> <img src="{{asset($testimonialLocation.'/'.$testimonial->thumbnail_location)}}" class="img-responsive small-thumbnail"> </td>
	            <td> {{ $testimonial->sort_order }} </td>
	            <td> {{ $testimonial->active ? 'Y' : 'N' }} </td>
	            <td>
	                <div class="margin-bottom-5">
	                    <a href="{{action('Admin\TestimonialController@edit', [$testimonial->id])}}" class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
	                </div>
	                {!!Form::open(['action' => ['Admin\TestimonialController@destroy', $testimonial->id], 'method' => 'DELETE'])!!}
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