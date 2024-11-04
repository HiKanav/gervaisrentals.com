@extends('admin.layout.create-edit')

@section('title') New Gallery Image @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\GalleryController@index')}}">Gallery</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('subject') Create New @stop

@section('all-link') {{action('Admin\GalleryController@index')}} @stop

@section('form')
	{!!Form::open(['action' => 'Admin\GalleryController@store', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.gallery._form-fields')
	{!!Form::close()!!}
@stop