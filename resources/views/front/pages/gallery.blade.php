@extends('front.layout.rsb')

@section('title')Gallery @stop

@section('left-content')
    <h2>Gallery Images</h2>
    {!!HTML::catalog('Display of our artistic work...', $galleryImages, $galleryLocation, ['href' => 'main_location', 'src' => 'main_location'], 'col-md-3 col-sm-2 col-xs-6')!!}
@stop

@section('js')
	@include('front.js.lightbox')
@stop