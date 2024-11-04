@extends('admin.layout.create-edit')

@section('title') New Question @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\TestimonialController@index')}}">Testimonials</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('subject') Create New @stop

@section('all-link') {{action('Admin\TestimonialController@index')}} @stop

@section('form')
	{!!Form::open(['action' => 'Admin\TestimonialController@store', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.testimonial._form-fields')
	{!!Form::close()!!}
@stop