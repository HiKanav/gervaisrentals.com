@extends('admin.layout.create-edit')

@section('title') Edit Client @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\ClientController@index')}}">Clients</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit</span>
    </li>
@stop

@section('subject') Edit @stop

@section('all-link') {{action('Admin\ClientController@index')}} @stop

@section('form')
    {!!Form::model($client, ['action' => ['Admin\ClientController@update', $client->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
        @include('admin.partials.client._form-fields')
    {!!Form::close()!!}
@stop