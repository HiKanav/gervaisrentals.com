@extends('admin.layout.create-edit')

@section('title') Edit Category @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\CategoryController@index')}}">Categories</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit</span>
    </li>
@stop

@section('subject') Edit @stop

@section('all-link') {{action('Admin\CategoryController@index')}} @stop

@section('form')
	{!!Form::model($category, ['action' => ['Admin\CategoryController@update', $category->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.category._form-fields')
	{!!Form::close()!!}
@stop