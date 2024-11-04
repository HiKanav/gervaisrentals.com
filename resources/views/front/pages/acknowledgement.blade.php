@extends('front.layout.rsb')

@section('title')Acknowledgements @stop

@section('left-content')
    <h2>Acknowledgements</h2>
    {!!HTML::catalog('We love to hear back...', $acknowledgements, $acknowledgementLocation, ['href' => 'file_location', 'src' => 'thumbnail_location'], 'col-md-3 col-sm-2 col-xs-6')!!}
@stop

