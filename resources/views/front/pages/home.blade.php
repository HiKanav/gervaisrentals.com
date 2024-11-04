@extends('front.layout.base')

@section('title')Gervais Party & Tent Rentals | For Corporate & Special Events @stop
@section('meta-title')Special Event Party Equipment & Tent Rentals Toronto @stop
@section('meta-description')Serving You Since 1949, Gervais Party Rentals Has Everything You Need To Throw The Perfect Party, Themed Event or Beautiful Wedding.  Call 1-888-437-8247.@stop

@section('content')
    <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> -->
    <style type="text/css">
    	#mc_embed_signup #mce-success-response{
    		display: contents;
    	}
    	#mc_embed_signup div#mce-responses{
    		float: none;
    	}
    </style>
	
	<!-- Banner -->
	<div class="container">
	    <div class="row">
	        <!-- <div class="col-md-12">
	            <div class="intro" style="position: relative;">
	            	<div class="overlay-banner-text" style="opacity: 0.3; color: white; background-color: black; position: absolute; width: 100%;">
						<h3 style="text-align: left;margin-left: 90px;padding-top: 3px;">“Getting Prepared to Service all your Event needs”<br><br>
						“Our phone lines are open or feel free to email us your quote request”
						 </h3> 
					</div>
	            </div>
	        </div> -->
	        <div class="col-md-12">
	            <div id="carousel-example-generic" class="carousel slide party-img" data-ride="carousel">
				  	<!-- <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol> -->
				  	<div class="carousel-inner" role="listbox">
<!-- 					    <div class="item main-banner active">
					      	<img src={{asset("default/front/imgs/edison-1.jpeg")}} alt="">
					    </div> -->
<!-- 					    <div class="item main-banner">
					      	<img src={{asset("default/front/imgs/special-party-img.jpeg")}} alt="">
					    </div> -->

					    <div class="item main-banner active">
					      	<img src={{asset("default/front/imgs/20200816_185103.jpg")}} alt="">
					    </div>
					    <div class="item main-banner">
					      	<img src={{asset("default/front/imgs/Daisy-flowers-and-tent.jpg")}} alt="">
					    </div>
					    <div class="item main-banner">
					      	<img src={{asset("default/front/imgs/Winter-wedding-small.jpeg")}} alt="">
					    </div>
				  	</div>
				  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    	<span class="sr-only">Previous</span>
				  	</a>
				  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    	<span class="sr-only">Next</span>
				  	</a>
				</div>
	        </div>
	    </div>
	</div>
	{{-- <h4 style="color: #073f67; text-align: center; font-size: 35px; margin-top: 40px;">
		Showroom open Monday to Friday<br>
		Saturday by appointment
	</h4> --}}
	<!--/ Banner -->

	<!-- welcome -->
	<!-- <div class="services" style="margin-top: -15px;">
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
	        <div class="row rentel" id="rental-catalogue">
	            <div class="services-features">
	                <div class="services-features-col col-xs-4"> <img src={{asset("default/front/imgs/rentel.jpg")}} alt="">
	                    <h3><a href="{{action('Front\PageController@getRentals')}}">Rental Catalogue</a></h3>
	                </div>
	                <div class="services-features-col col-xs-4"> <img src={{asset("default/front/imgs/quote.jpg")}} alt="">
	                    <h3><a href="{{action('Front\PageController@getRentals')}}">Create Quote</a></h3>
	                </div>
	                <div class="services-features-col col-xs-4"> <img src={{asset("default/front/imgs/review.jpg")}} alt="">
	                    <h3><a href="{{action('Front\PageController@getReviews')}}">Reviews</a></h3>
	                </div>
	            </div>
	        </div>
	    </div>
	</div> -->
	<!--/ welcome -->

	<!-- Special Event -->
	<div class="latest">
	    <div class="container">
	        <div class="row">
	            
	            <div class="col-xs-12 col-md-7 col-sm-7">
	                <div class="latest-features">
	                    <h1 style="font-size: 30px">Special Event Party Rentals </h1>
	                    <p>Make your next wedding reception, birthday party or corporate event an affair to remember 
	                        with special event rentals from Gervais Party & Tent Rentals. We carry an incredible selection 
	                        of over 2,400 high quality party supplies for rent, including lounge furniture and tents, 
	                        serving pieces and dishes, linens, stage, dance floors and a seemingly endless list of
	                        party equipment.</p>
	                    <p>We supply the party rentals Toronto brides, party planners and others who need to
	                        create events that are on budget and always well-received. Our customers can expect 
	                        to receive prompt, professional delivery and outstanding customer service, because 
	                        our customers are the most important part of our business! </p>
	                    <a role="button" href="{{action('Front\PageController@getAbout')}}" class="btn btn-primary btn-lg learn">Read More</a> </div>
	            </div>
	            
	           <div class="col-xs-12 col-sm-5 col-md-5 party-img"> <img src={{asset("default/front/imgs/party-img.jpg")}} class="img-responsive" alt=""> </div>
	           <!-- <div class="col-xs-12 col-sm-5 col-md-5 ">
		           	<div id="carousel-example-generic" class="carousel slide party-img" data-ride="carousel"> -->
					  	<!-- Indicators -->
					  	<!-- <ol class="carousel-indicators">
						    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol> -->

					  	<!-- Wrapper for slides -->
					  	<!-- <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src={{asset("default/front/imgs/edison-1.jpeg")}} alt="">
						    </div>
						    <div class="item">
						      <img src={{asset("default/front/imgs/special-party-img.jpeg")}} alt="">
						    </div>
					  	</div> -->
					  	<!-- Controls -->
					  	<!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    	<span class="sr-only">Previous</span>
					  	</a>
					  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
					</div>
				</div> -->
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
	                    <!-- <h3>Rental Catalogue</h3> -->
	                    <a href="javascript:void(0);"><img src={{asset("default/front/imgs/rental-title.jpg")}} alt=""></a>
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
										<a class="view-bnt" href="{{route('category-products', [$category->route_name])}}">
										<div class="product-overlay product-box">
											<div class="overlay-content">
												<h3>{{ $category->name }}</h3>
												<!-- <a class="view-bnt" href="{{route('category-products', [$category->route_name])}}"> -->
										        View Now<!-- </a> -->
											</div>
										</div>
										</a>
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
	            <a href="{{action('Front\PageController@getGallery')}}"> VISIT OUR GALLERY </a>
	            </div>
	            </div>
	            
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
	            <div class="link-1 watch-3 tent">
	            <a href="{{action('Front\PageController@getTentSize')}}"><span> WHAT SIZE TENT<br/> DO I REQUIRE? </span></a>
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
	                <h2>“We Carry A Selection of over 2,600 rental items” </h2>
	            </div>
	            <div class="col-md-2"> <a role="button" href="{{action('Front\PageController@getRentals')}}" class="btn btn-primary btn-lg learn contact-b explore">Explore</a> </div>
	        </div>

	    </div>
	</div>
	<!--/ Carry -->

	<div id="mc_embed_signup">
	    <form action="https://gervaisrentals.us4.list-manage.com/subscribe/post?u=ea21455c1157acd54de313f47&amp;id=f478b017fd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	        <div id="mc_embed_signup_scroll">
	            <h2 style="font-size: 24px;">Subscribe Now! for new products, hot deals and new ideas!</h2>
	            <div class="mc-field-group">
	                <input type="email" value="" name="EMAIL" class="required email align_media" id="mce-EMAIL" placeholder="Enter email to subscribe" style="width: 650px; border-radius: 0; height: 50px; padding: 11px; font-size: 16px;">
	                <div style="position: absolute; left: -5000px;" aria-hidden="true">
	                	<input type="text" name="b_ea21455c1157acd54de313f47_f478b017fd" tabindex="-1" value="">
	                </div>
            		<div class="clear">
            			<input type="submit" value="Subscribe" name="subscribe" style="height: 50px; font-size: 16px; margin-left: -5px;" id="mc-embedded-subscribe" class="button">
            		</div>
	            </div>
	            <div id="mce-responses" class="clear">
	                <div class="response" id="mce-error-response" style="display:none"></div>
	                <div class="response" id="mce-success-response" style="display:none"></div>
	            </div>
	            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	          
	        </div>
	    </form>
	</div>

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