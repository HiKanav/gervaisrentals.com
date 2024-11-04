@extends('front.layout.rsb')

@section('title')Tent Pictures @stop

@section('left-content')
    <h2>Tent Pictures</h2>
    @foreach($tentPictureCategories as $tentPictureCategory)
		{!!HTML::catalog($tentPictureCategory->name, $tentPictureCategory->pictures, $tentPictureLocation, ['href' => 'main_location', 'src' => 'thumbnail_location'], 'col-md-3 col-sm-2 col-xs-6')!!}
    @endforeach
@stop

@section('js')
	@include('front.js.lightbox')
@stop