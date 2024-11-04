@extends('admin.layout.create-edit')

@section('title') Edit Extra Charges @stop

@section('subject') Edit @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ExtraChargeController@getIndex')}}">Extra Charges</a></span>
    </li>
@stop

@section('form')
	{!!Form::open(['action' => 'Admin\ExtraChargeController@postIndex', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.extra._form-fields')
	{!!Form::close()!!}

@stop
