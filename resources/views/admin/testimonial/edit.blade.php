@extends('admin.layout.create-edit')

@section('title') Edit Question @stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\TestimonialController@index')}}">Testimonials</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit</span>
    </li>
@stop

@section('subject') Edit @stop

@section('all-link') {{action('Admin\TestimonialController@index')}} @stop

@section('form')
    {!!Form::model($testimonial, ['action' => ['Admin\TestimonialController@update', $testimonial->id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal', 'id' => 'form'])!!}
        @include('admin.partials.testimonial._form-fields')
    {!!Form::close()!!}
@stop