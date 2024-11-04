@extends('admin.layout.create-edit')

@section('title') Edit Faq @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\FaqController@index')}}">Faq</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit</span>
    </li>
@stop

@section('subject') Edit @stop

@section('all-link') {{action('Admin\FaqController@index')}} @stop

@section('form')
    {!!Form::model($faq, ['action' => ['Admin\FaqController@update', $faq->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form'])!!}
        @include('admin.partials.faq._form-fields')
    {!!Form::close()!!}
@stop