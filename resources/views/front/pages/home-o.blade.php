@extends('front.layout.base')

@section('title')Gervais Party and Tents Rentals @stop
@section('meta-title')Special Event Party Equipment & Tent Rentals Toronto @stop
@section('meta-description')Serving You Since 1949, Gervais Party Rentals Has Everything You Need To Throw The Perfect Party, Themed Event or Beautiful Wedding.  Call 1-888-437-8247.@stop

@section('content')
	<!-- welcome -->    
    <div class="services-features text-center">
        <h3><a href="{{asset('imgs/brochure.pdf')}}">CLICK HERE TO DOWNLOAD OUR BROCHURE</a></h3>
    </div>
    
	
	<!-- Banner -->
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="intro"> </div>
	        </div>
	    </div>
	</div>
	<!--/ Banner -->

	<!-- welcome -->
	<div class="services">
	    <div class="welcome">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-6 col-md-offset-3">
	                    <div class="services-title">
	                        <h2>Gervais Party & Tent Rentals</h2>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12"> </div>
	        </div>
	        <div class="row rentel">
	            <div class="services-features">
	                <div class="services-features-col col-xs-4"> <img src={{asset("default/front/imgs/rentel.jpg")}} alt="">
	                    <h3><a href="{{action('Front\PageController@getRentals')}}">Rental Catalogue</a></h3>
	                </div>
	                <div class="services-features-col col-xs-4"> <img src={{asset("default/front/imgs/quote.jpg")}} alt="">
	                    <h3><a href="{{route('category-products', [$categories->first()->route_name])}}">Create Quote</a></h3>
	                </div>
	                <div class="services-features-col col-xs-4"> <img src={{asset("default/front/imgs/review.jpg")}} alt="">
	                    <h3><a href="{{action('Front\PageController@getReviews')}}">Reviews</a></h3>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--/ welcome -->

	<!-- Special Event -->
	<div class="latest">
	    <div class="container">
	        <div class="row">
	            
	            <div class="col-xs-12 col-md-7 col-sm-7">
	                <div class="latest-features">
	                    <h3>Special Event Party Rentals </h3>
	                    <p>Make your next wedding reception, birthday party or corporate event an affair to remember 
	                        with special event rentals from Gervais Party & Tent Rentals. We carry an incredible selection 
	                        of over 1,200 high quality party supplies for rent, including lounge furniture and tents, 
	                        serving pieces and dishes, linens, stage, dance floors and a seemingly endless list of
	                        party equipment.</p>
	                    <p>We supply the party rentals Toronto brides, party planners and others who need to
	                        create events that are on budget and always well-received. Our customers can expect 
	                        to receive prompt, professional delivery and outstanding customer service, because 
	                        our customers are the most important part of our business! </p>
	                    <a role="button" href="{{action('Front\PageController@getAbout')}}" class="btn btn-primary btn-lg learn">Read More</a> </div>
	            </div>
	            
	            <div class="col-xs-12 col-sm-5 col-md-5 party-img"> <img src={{asset("default/front/imgs/party-img.jpg")}} class="img-responsive" alt=""> </div>
	        </div>
	    </div>
	</div>
	<!--/ Special Event -->

	<!-- Rental Catalogue -->
	<div class="features2">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12 catalogue">
	                <div class="col-xs-8 col-md-4 col-sm-6 rent-img">
	                    <h3>Rental Catalogue</h3>
	                    <a href="#"><img src={{asset("default/front/imgs/rental-title.jpg")}} alt=""></a>
	                </div>
	                <div class="col-xs-4 col-sm-4 col-md-2 pull-right arrow-top">
	                    <div class="arrow"> <a class="arrow-left" data-side="left" href="javascript:"><img src={{asset("default/front/imgs/arrow-left.png")}} alt="" id="previous_catalogue"></a> <span id="current_catalogue">1</span> <a class="arrow-right" data-side="right" href="javascript:" id="next_catalogue"><img src={{asset("default/front/imgs/arrow-right.png")}} alt=""></a> </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="row"> </div>
	</div>

	<div class="clients">
	    <div class="container">
	        <div class="row rentel-cal">
				<div class="col-md-12">
					@foreach($categories->chunk(6) as $batch => $categoryGroup)
					    <div class="product">
					    	@foreach($categoryGroup as $category)
								<div class="col-md-2 col-sm-2 col-xs-6 rent party">
									<div class="col-in-row col-row-2 rent_in">
										<div class="product-overlay">
											<div class="overlay-content">
												<h3>{{ $category->name }}</h3>
												<a class="view-bnt" href="{{route('category-products', [$category->route_name])}}">
										        View Now</a>
											</div>
										</div>
										<a href="{{route('category-products', [$category->route_name])}}"><img src="{{asset($categoryLocation.'/'.$category->thumbnail_location)}}" alt="{{$category->name}}"></a>
									</div>
								</div>
							@endforeach
				    		@if(!($batch & 1) && ($batch != $categories->chunk(6)->keys()->last()))<div class="hr"></div>@endif
						</div>
				    @endforeach
				</div>
	        </div>
	    </div>
	</div>
	<!--/ Rental Catalogue-->

	<!-- Contact us -->
	<div class="ready">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12 col-sm-9 col-md-10 queat-text">
	                <h3>Ready for a quote?</h3>
	                <p> If you need to rent party supplies or are searching for tent rentals in Toronto for your next wedding, banquet or other special event, 
	                    you can count on Gervais Party & Tent Rentals. <span>Contact us today!</span> </p>
	            </div>
	            <div class="col-md-2 cont"> <a class="btn btn-primary btn-lg learn contact-b" href="{{action('Front\PageController@getContactUs')}}" role="button">Contact Us</a> </div>
	        </div>
	    </div>
	</div>
	<!--/ Contact us -->

	<!-- Services -->
	<div class="clients-imgs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-1">
	            <a href="{{action('Front\PageController@getVideos')}}"> WATCH OUR VIDEOS </a>
	            </div>
	            </div>
	            
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-2">
	            <a href="{{action('Front\PageController@getGallery')}}"> VISIT OUR GALLARY </a>
	            </div>
	            </div>
	            
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-3 tent">
	            <a href="{{action('Front\PageController@getTentSize')}}"><span> WHAT SIZE TENT<br/> DO NEED? </span></a>
	            </div>
	            </div>
	            
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-4">
	            <a href="{{action('Front\PageController@getFaq')}}"> FAQ  </a>
	            </div>
	            </div>
	            
	            {{--<div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-5">
	            <a href="{{action('Front\PageController@getTentPictures')}}"> TENT PICTURES </a>
	            </div>
	            </div>--}}
	            
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-6">
	            <a href="{{action('Front\PageController@getTestimonials')}}"> TESTIMONIALS </a>
	            </div>
	            </div>
	            
	        </div>
	    </div>
	</div>
	<!--/ Services -->

	<!-- Carry -->
	<div class="we_carry">
	    <div class="container">
	        <div class="row">
	            <div class="footer-arrow"> <img src={{asset("default/front/imgs/footer-arrow.png")}} alt=""> </div>
	            <div class="col-xs-12 col-sm-9 col-md-10 carry-text">
	                <h2>“We Carry A Selection of over 1,200 rental items” </h2>
	            </div>
	            <div class="col-md-2"> <a role="button" href="{{action('Front\PageController@getRentals')}}" class="btn btn-primary btn-lg learn contact-b explore">Explore</a> </div>
	        </div>
	    </div>
	</div>
	<!--/ Carry -->
@stop

@section('js')
<script>
	$(function(){
		var perPage = 2;
		$(".product").hide().filter(".product:lt("+perPage+")").show();

		$(".arrow a").on("click", function(){
			var currentPage = parseInt($("#current_catalogue").text());
			var pageToOpen = $(this).data('side') == "left" ? currentPage-1 : currentPage+1;
			var maxpage = Math.ceil($(".product").length/perPage);

			if(pageToOpen == 0 || pageToOpen > maxpage) return;
			divsToOpen = [];
			for (var i = perPage; i > 0; i--) divsToOpen[divsToOpen.length] = (pageToOpen*perPage)-i;

			$(".product").hide().filter(function(index){return $.inArray(index, divsToOpen) !== -1}).fadeIn(1000);
			$("#current_catalogue").text(pageToOpen)
		});
		/*$("#next_catalogue").on("click", function(){
			var currentPage = parseInt($("#current_catalogue").text());
			var nextPage = currentPage+1;
			$("#current_catalogue").text(nextPage)
			$(".product").fadeOut();

			$(".product").eq((nextPage*2)-2).fadeIn(1000);
			$(".product").eq((nextPage*2)-1).fadeIn(1000);
		});

		$("#previous_catalogue").on("click", function(){
			var currentPage = parseInt($("#current_catalogue").text());
			var prevPage = currentPage-1;
			if(prevPage == 0) return;
			$("#current_catalogue").text(prevPage)
			$(".product").fadeOut();

			$(".product").eq((prevPage*2)-2).fadeIn(1000);
			$(".product").eq((prevPage*2)-1).fadeIn(1000);
		});*/
	});
</script>
@stop