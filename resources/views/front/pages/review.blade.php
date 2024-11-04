@extends('front.layout.rsb')

@section('title')Reviews @stop

@section('left-content')
    <h2>Reviews</h2>
    {{-- <script src="https://static.n49.ca/templates/n49red/js/reviewus/embed.js" type="text/javascript"></script>
    <iframe src="https://www.n49.com/reviewus/15769/ce551765a4ff982ac45f70ba52b767c3/?details=1&amp;writeReview=1&amp;quote=1&amp;aggregate=1&amp;employeeFilter=0&amp;rating=6" width="100%" height="150" frameborder="0"></iframe> --}}
    
    <p class="text-center"><a href="https://www.google.com/search?source=hp&ei=6KweW6rjPMKewgSL7peAAg&q=gervais+party+rentals&oq=gervais+party&gs_l=psy-ab.1.0.0l5.1754.6701.0.10167.14.11.0.0.0.0.359.1232.2-1j3.4.0....0...1c.1.64.psy-ab..10.4.1230.0..0i131k1j0i10k1.0.sPQ0wOLCjps#lrd=0x89d4d103f828e859:0xa18fbe44e7b88018,1,,," target="_blank">Please feel free to review our services on Google Reviews</a></p>
    <div id="google-reviews"></div>


    <link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/stevenmonson/googleReviews/6e8f0d79/google-places.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDd3Ger6eJ0fzB6jbJXRlS99Y6gVlsJnRw&libraries=places"></script>

    <script>
    jQuery(document).ready(function( $ ) {
       $("#google-reviews").googlePlaces({
            placeId: 'ChIJWego-APR1IkRGIC450S-j6E' //Find placeID @: https://developers.google.com/places/place-id
          , render: ['reviews']
          , min_rating: 4
          , max_rows:10
       });
    });
    </script>
@stop