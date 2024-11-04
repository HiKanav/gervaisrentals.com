@extends('front.layout.rsb')

@section('title')Frequently Asked Question @stop

@section('left-content')
    <h2>FAQ</h2>
    <style>
        ul, ol {
            padding-left: 50px;
            list-style: disc !important; 
        }
        li {
            line-height: 20px !important;
        }
    </style>
    @foreach($faqs as $faq)
        <blockquote><p><strong><i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i> {{$faq->question}}</strong></p></blockquote>
        {!!$faq->answer!!}
        <hr>
    @endforeach
@stop