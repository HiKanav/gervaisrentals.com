@extends('admin.layout.create-edit')

@section('title') New Faq @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\FaqController@index')}}">Faq</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('subject') Create New @stop

@section('all-link') {{action('Admin\FaqController@index')}} @stop

@section('form')
	{!!Form::open(['action' => 'Admin\FaqController@store', 'class' => 'form-horizontal', 'id' => 'form'])!!}
		@include('admin.partials.faq._form-fields')
	{!!Form::close()!!}
@stop