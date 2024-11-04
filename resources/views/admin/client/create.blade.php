@extends('admin.layout.create-edit')

@section('title') New Client @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ClientController@index')}}">Clients</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('subject') Create New @stop

@section('all-link') {{action('Admin\ClientController@index')}} @stop

@section('form')
	{!!Form::open(['action' => 'Admin\ClientController@store', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.client._form-fields')
	{!!Form::close()!!}
@stop