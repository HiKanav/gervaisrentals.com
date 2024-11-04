@extends('front.layout.rsb')

@section('title')Clients @stop

@section('left-content')
    <h2>Clients</h2>
    {!!HTML::catalog('Our services used by various clients...', $clients, $clientLocation, ['href' => 'file_location', 'src' => 'thumbnail_location'], 'col-md-2 col-sm-2 col-xs-6')!!}
@stop