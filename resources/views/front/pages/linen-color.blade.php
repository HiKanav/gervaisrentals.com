@extends('front.layout.rsb')

@section('title')Linen Colors @stop

@section('left-content')
    <h2>Linen Colors</h2>
    @include('front.partials._linen-nav')
	{!!HTML::catalog('Linen Colors', $linenColors, $linenLocation, ['href' => 'main_location', 'src' => 'main_location', 'title' => 'name'] ,'col-md-3 col-sm-4 col-xs-6')!!}
@stop

@section('js')
	@include('front.js.lightbox')
@stop