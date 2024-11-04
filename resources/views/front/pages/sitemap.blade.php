@extends('front.layout.rsb')

@section('title')Sitemap @stop

@section('left-content')
    <h2>Sitemap</h2>
	<div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <strong><h3>Rentals</h3></strong>
            <ul class="list-group">
            	@foreach($rentals as $rental)
              		<a href="{{action('Front\PageController@getCategoryProducts', [$rental->route_name])}}" class="list-group-item">{{$rental->name}}</a>
              	@endforeach
            </ul>            
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <strong><h3>Linen</h3></strong>
           
            <ul class="list-group">
                <a href="{{action('Front\PageController@getLinenColors')}}" class="list-group-item">Linen Colors</a>
                <a href="{{action('Front\PageController@getLinenSizes')}}" class="list-group-item">Linen Sizes</a>
                <a href="{{action('Front\PageController@getLinenCharts')}}" class="list-group-item">Linen Charts</a>
                @foreach($linens as $linen)
                    <a href="{{action('Front\PageController@getCategoryProducts', [$linen->route_name])}}" class="list-group-item">{{$linen->name}}</a>
                @endforeach
            </ul>            
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
        	<strong><h3>Tents</h3></strong>

            <ul class="list-group">
                <a href="{{action('Front\PageController@getTents')}}" class="list-group-item">Tents</a>
                @foreach($tents as $tent)
          			<a href="{{action('Front\PageController@getCategoryProducts', [$tent->route_name])}}" class="list-group-item">{{$tent->name}}</a>
          	    @endforeach
                <a href="{{action('Front\PageController@getTentPictures')}}" class="list-group-item">Tent Images</a>
                <a href="{{action('Front\PageController@getCentennial')}}" class="list-group-item">Centennial College Convocation</a>
                <a href="{{action('Front\PageController@getOsahawa')}}" class="list-group-item">Oshawa Garden &amp; Landscape Show</a>
            </ul>
            
            <strong><h3>Bookmarks</h3></strong>
           
            <ul class="list-group">
                <a href="{{action('Front\PageController@getWhatsNew')}}" class="list-group-item">What's New</a>
                <a href="{{action('Front\PageController@getFaq')}}" class="list-group-item">Frequently Asked Questions</a>
                <a href="{{action('Front\PageController@getSearch')}}" class="list-group-item">Search</a>
                <a href="{{action('Front\PageController@getContactUs')}}" class="list-group-item">Contact Us</a>
                <a href="https://maps.google.com/maps?ll=43.783534,-79.250916&z=16&t=m&hl=en-US&gl=IN&mapclient=embed&cid=11641732764930703384" class="list-group-item">Directions</a>
            </ul>       
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
        	<strong><h3>Pages</h3></strong>

            <ul class="list-group">
                <a href="{{action('Front\PageController@getIndex')}}" class="list-group-item">Home</a>
                <a href="{{action('Front\PageController@getAbout')}}" class="list-group-item">About Us</a>
                <a href="{{action('Front\PageController@getMission')}}" class="list-group-item">Mission</a>
                <a href="{{action('Front\PageController@getMission')}}" class="list-group-item">Vision</a>
                <a href="{{action('Front\PageController@getMission')}}" class="list-group-item">Value</a>
                <a href="{{action('Front\PageController@getCaterers')}}" class="list-group-item">Our Caterers &amp; Event Planners</a>
                <a href="{{action('Front\PageController@getTestimonials')}}" class="list-group-item">Testimonials</a>
                <a href="{{action('Front\PageController@getReviews')}}" class="list-group-item">Reviews</a>
                <a href="{{action('Front\PageController@getAcknowledgements')}}" class="list-group-item">Acknowledgements</a>
                <a href="{{asset('imgs/Customer-Creed.pdf')}}" class="list-group-item">Customer Creed</a>
            </ul>            
        </div>
	</div>
@stop