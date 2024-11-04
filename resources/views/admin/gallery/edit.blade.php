@extends('admin.layout.create-edit')

@section('title') Edit Gallery Image @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\GalleryController@index')}}">Gallery</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit</span>
    </li>
@stop

@section('subject') Edit @stop

@section('all-link') {{action('Admin\GalleryController@index')}} @stop

@section('form')
    {!!Form::model($galleryImage, ['action' => ['Admin\GalleryController@update', $galleryImage->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
        @include('admin.partials.gallery._form-fields')
    {!!Form::close()!!}
@stop