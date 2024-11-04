@extends('admin.layout.create-edit')

@section('title') New Product @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ProductController@index')}}">Products</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('subject') Create New @stop

@section('all-link') {{action('Admin\ProductController@index')}} @stop

@section('form')
	{!!Form::open(['action' => 'Admin\ProductController@store', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.product._form-fields')
	{!!Form::close()!!}
@stop