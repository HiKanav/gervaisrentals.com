@extends('front.layout.rsb')

@section('title')Osahawa Garden &amp; Landscape Show @stop

@section('left-content')
    <h2>Osahawa Garden &amp; Landscape Show </h2>
    <p>Go to <a href="{{action('Front\PageController@getTents')}}">Tents</a> Page</p>
	{!!HTML::catalog('Osahawa Garden &amp; Landscape Show', $osahawas, $osahawaLocation, ['href' => 'main_location', 'src' => 'main_location'], 'col-md-3 col-sm-2 col-xs-6')!!}
@stop

@section('js')
	@include('front.js.lightbox')
@stop