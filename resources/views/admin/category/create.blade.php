@extends('admin.layout.create-edit')

@section('title') New Category @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\CategoryController@index')}}">Categories</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('subject') Create New @stop

@section('all-link') {{action('Admin\CategoryController@index')}} @stop

@section('form')
	{!!Form::open(['action' => 'Admin\CategoryController@store', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.category._form-fields')
	{!!Form::close()!!}
@stop