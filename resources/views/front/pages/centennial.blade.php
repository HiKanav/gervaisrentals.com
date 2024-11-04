@extends('front.layout.rsb')

@section('title')Centennial College Convocation @stop

@section('left-content')
    <h2>Centennial College Convocation</h2>
	{!!HTML::catalog('Centennial College Convocation', $centennials, $centennialLocation, ['href' => 'main_location', 'src' => 'main_location'], 'col-md-3 col-sm-2 col-xs-6')!!}
@stop

@section('js')
	@include('front.js.lightbox')
@stop