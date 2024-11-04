@extends('admin.layout.create-edit')

@section('title') Edit Product @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ProductController@index')}}">Products</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit</span>
    </li>
@stop

@section('subject') Edit @stop

@section('all-link') {{action('Admin\ProductController@index')}} @stop

@section('form')
	{!!Form::model($product, ['action' => ['Admin\ProductController@update', $product->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
        @include('admin.partials.product._form-fields')
    {!!Form::close()!!}
@stop