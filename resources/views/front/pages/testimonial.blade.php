@extends('front.layout.rsb')

@section('title')Testimonials @stop

@section('left-content')
    <h2>Testimonials</h2>
    {!!HTML::catalog('We love to hear back...', $testimonials, $testimonialLocation, ['href' => 'file_location', 'src' => 'thumbnail_location'], 'col-md-2 col-sm-2 col-xs-6')!!}
@stop