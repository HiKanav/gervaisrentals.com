@extends('front.layout.rsb')

@section('title')Search @stop

@section('left-content')
    <h2>Please enter some text in the box below and press enter</h2>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('front/partials._search')
        </div>   
    </div>
@stop