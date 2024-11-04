@extends('front.layout.rsb')

@section('title'){{trim($category->title) ?: trim($category->name)}} @stop
@section('meta-title'){{trim($category->meta_title)}} @stop
@section('meta-description'){{trim($category->meta_description)}}@stop
@section('meta-keywords'){{trim($category->name)}}@stop

@section('left-content')
    <ul class="breadcrumb">
        <li><a href="{{ action('Front\PageController@getIndex') }}">Home</a></li>
        <li class="active"><a href="{{ url($category->route_name) }}">{{ $category->name }}</a></li>
    </ul>
	<h2>{{$category->name}} @if($category->id === 12)(By The Dozen) @elseif($category->id === 2) (Dishes ordered in multiples of 5) @endif</h2>
	<p>{!!nl2br($category->description)!!}</p>


	@if($category->id == 19)@include('front.partials._linen-nav') @endif

	@if($category->childs->count())
	    {!!HTML::catalog('Sub Categories' . ($category->id === 12 ? ' (By The Dozen)' : ($category->id === 2 ? ' (Dishes ordered in multiples of 5)' : '')) , $childCategories, $categoryLocation, ['is_href_img' => false, 'href' => 'file_location', 'src' => 'thumbnail_location', 'title' => 'name', 'category_id' => $category->id],'col-md-2 col-sm-4 col-xs-6')!!}
	    {{--<div class="col-md-12 catalogue-2">
	        <div class="col-xs-6 col-md-8 col-sm-6 rent-img rent-2">
	            <h3>Sub Categories</h3>
	            <a href="#"><img src={{asset("default/front/imgs/rental-title.jpg")}} alt=""></a> </div>
	    </div>--}}
	    {{--
	    <div class="row rentel-cal about-col">
	        <div class="col-md-12">
	        	@foreach($childCategories->chunk(6) as $batch => $categoryGroup)
				    <div class="product">
				    	@foreach($categoryGroup as $category)
							<div class="col-md-2 col-sm-2 col-xs-6 rent"> <a href="{{route('category-products', [$category->route_name])}}"><img src="{{asset($categoryLocation.'/'.$category->thumbnail_location)}}" alt="{{$category->name}}"></a> </div>
						@endforeach
						
			    		@if($batch != $childCategories->chunk(6)->keys()->last())<div class="hr"></div>@endif
					</div>
			    @endforeach
	        </div>
	    </div>
	    --}}
	    @if($category->id == 19)
		<table class="table" style="margin-top: 5px;">
		    <thead>
		    	<tr class="info">
	    			<th colspan="3" class="text-center lead">Sizing Worksheet</th>
	    		</tr>
		      <tr>
		        <th>Linen size</th>
		        <th>Table Size</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td width="35%">54" x 54"</td>
		        <td>30" x 30"</td>
		      </tr>
		      <tr>
		        <td>72" x 72"</td>
		        <td>30" x 30"/ 30" x 48"</td>
		      </tr>
		      <tr>
		        <td>90" x 90"</td>
		        <td>30” x 48”/ 48" Round Table/ 54"Round Table/ 60" Round Table</td>
		      </tr>
		      <tr>
		        <td>72" x 144"</td>
		        <td>30" x 72" (6ft Table)/ 30" x 96" (8ft Table)</td>
		      </tr>
		      <td>90" x 144"</td>
		        <td>30" x 72" (6ft Table)/ 30" x 96" (8ft Table) </td>
		      </tr>
		      <tr>
		        <td>90" x 156"</td>
		        <td>30" x 96" (8 ft Table)</td>
		      </tr>
		      <tr>
		        <td>96" Round</td>
		        <td>36" Round Table/ 48" Round Table/ 54" Round Table/ 60" Round Table</td>
		      </tr>
		      <tr>
		        <td>120" Round</td>
		        <td>60" Round Table/ 66" Round Table/ 60" Square Table/ 66" Square Table</td>
		      </tr>
		      <tr>
		        <td>120" Round</td>
		        <td>24” Round Cruiser Table/ Hightop Table</td>
		      </tr>
		      <tr>
		        <td>132" Round</td>
		        <td>72" Round Table/ 84" Round Table </td>
		      </tr>
		    </tbody>
  		</table>
		@endif
	@endif

	@if($category->id == 23)
		<br>
	    <!-- <div class="container">
	        <div class="row">
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
		            <div class="link-1 watch-4 tent">
		            	<a href="{{asset('imgs/gervais-tent-package-2018.pdf?v=1')}}"><span> Click here to see what's included in<br/> our Tent Packages </span></a>
		            </div>
	            </div>
	            <div class="col-md-2 col-sm-2 col-xs-6 client-link">
		            <div class="link-1 watch-6 tent">
		            	<a href="{{asset('imgs/Wedding-Package-Products-2021.pdf')}}"><span> Wedding Package<br/> Pictures </span></a>
		            </div>
	            </div>
	        </div>
	    </div> -->
	    <!-- <div class="container"> -->
	        <div class="rental-cards">
	            <div class="row">
	                <div class="col-md-3 col-sm-6">
	                    <a href="{{action('Front\PageController@getGallery')}}">
	                        <div class="card block-cards card-1">
	                            <div class="card-body">
	                                <h3>Visit Our<br> Gallery</h3>
	                            </div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-md-3 col-sm-6">
	                    <a href="{{action('Front\PageController@getTentSize')}}">
	                        <div class="card block-cards card-2">
	                            <div class="card-body">
	                                <h3>What size tent do i require?</h3>
	                            </div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-md-3 col-sm-6">
	                    <a href="{{asset('imgs/gervais-tent-package-2024.pdf?v=1')}}">
	                        <div class="card block-cards card-3">
	                            <div class="card-body">
	                                <h3>Click here to see what's included in our tent packages</h3>
	                            </div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-md-3 col-sm-6">
	                    <a href="{{asset('imgs/Wedding-Package-Products-2021.pdf')}}">
	                        <div class="card block-cards card-4">
	                            <div class="card-body">
	                                <h3>Wedding Package pictures</h3>
	                            </div>
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
	    <!-- </div> -->
	@endif

	@if($category->products->count())
		<section class="products-listing">
		    <hr>
		    <div class="row">
		        <div class="col-sm-4"><p class="lead">Product</p></div>
		        <div class="col-sm-4"><p class="lead">Price</p></div>
		        <div class="col-sm-4 text-center"><p class="lead">Quantity</p></div>
		    </div>
		    {!!Form::open(['action' => 'Front\PageController@postRequestQuote'])!!}
			    @foreach($category->products->sortBy('price') as $product)
			    <hr>
			    <div class="row">
			        <div class="col-sm-4">
			            <p id="{{ $product->id }}"><a href="{{ action('Front\PageController@getProductDetails', $product->id) }}"><i>{{$product->name}}</i></a></p>
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="carousel slide" id="Carousel">
			                     
			                        <!-- <ol class="carousel-indicators">
			                            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
			                            <li data-target="#Carousel" data-slide-to="1"></li>
			                            <li data-target="#Carousel" data-slide-to="2"></li>
			                        </ol> -->
			                     
			                        <!-- Carousel items -->
			                        <div class="carousel-inner">
			                            <div class="item active">
			                                <div class="row">

		                                	@if($product->thumbnail_location_1 && File::exists(public_path().'/'.$productLocation.'/'.$product->thumbnail_location_1))
			                                  <div class="col-xs-4"><a class="thumbnail" href="{{asset($productLocation.'/'.$product->image_location_1)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox"><img style="max-width:100%;" alt="Img" src="{{asset($productLocation.'/'.$product->thumbnail_location_1)}}"></a></div>
			                                @endif
		                                	@if($product->thumbnail_location_2 && File::exists(public_path().'/'.$productLocation.'/'.$product->thumbnail_location_2))
			                                  <div class="col-xs-4">
			                                  	@if($product->thumbnail_image_2 && File::exists(public_path().'/'.$productLocation.'/'.$product->image_location_2))
			                                  		<a class="thumbnail" href="{{asset($productLocation.'/'.$product->image_location_2)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
			                                  	@else
			                                  		<a class="thumbnail" href="{{asset($productLocation.'/'.$product->thumbnail_location_2)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
			                                  	@endif
			                                  			<img style="max-width:100%;" alt="Img" src="{{asset($productLocation.'/'.$product->thumbnail_location_2)}}">
			                                  		</a>
			                                  </div>
		                                	@endif
		                                	@if($product->thumbnail_location_3 && File::exists(public_path().'/'.$productLocation.'/'.$product->thumbnail_location_3))
			                                    <div class="col-xs-4">
			                                    	@if($product->thumbnail_image_3 && File::exists(public_path().'/'.$productLocation.'/'.$product->image_location_3))
				                                  		<a class="thumbnail" href="{{asset($productLocation.'/'.$product->image_location_3)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
				                                  	@else
														<a class="thumbnail" href="{{asset($productLocation.'/'.$product->thumbnail_location_3)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
				                                  	@endif
				                                  		<img style="max-width:100%;" alt="Img" src="{{asset($productLocation.'/'.$product->thumbnail_location_3)}}">
				                                  	</a>
			                                  	</div>
		                                	@endif
			                                </div><!--.row-->
			                            </div><!--.item-->
			                        </div><!--.carousel-inner-->
			                    </div><!--.Carousel-->
			                </div>
			            </div>
			        </div>
			        <div class="col-sm-4"><p><i>{{'$'.number_format((float)$product->price, 2, '.', '')}}</i></p></div>
			        <div class="col-sm-4">
			            <div class="row product">
			                <div class="col-sm-6 col-sm-offset-1">
			                    <div class="input-group">
			                        <span id="sizing-addon1" class="input-group-addon"><i aria-hidden="true" class="fa fa-cart-plus"></i></span>
			                        <input type="number" min="{{$product->min}}" max="{{$product->max}}" step="{{$product->step}}" aria-describedby="sizing-addon1" placeholder="#" class="form-control quantity" name="product_quantity[{{$product->id}}]" @if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) value="{{ Session::get('product_quantity')[$product->id] }}" @endif>
			                    </div>
			                </div>
			               
			                <span class="hidden-sm hidden-md hidden-lg"><br></span>
			                <div class="col-sm-5 text-left">
			                    <button class="btn btn-primary proceed">@if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) Update @else Add @endif</button>
			                </div>
			            </div>
			        </div>
			    </div>
			    @endforeach
		    {!!Form::close()!!}
		
		</section>
	@endif
	
	<hr>

	@if($category->id == 23)
		<h2>Helpful Hints for Tent Sizing</h2>
	 	<!-- <div class="well well-lg text-center"><a class="h4 text-primary" href="{{asset('imgs/gervais-tent-package-2018.pdf?v=1')}}">Click here to see what's included in our Tent Packages</a></div> -->
		<table class="table table-bordered">
		    <tr><td>Guest seated at tables - 10 sq. ft. per person</td></tr>
		    <tr><td>Guest standing - 6 sq. ft. per person</td></tr>
		    <tr><td>Head table guest - 20 sq. ft. per person</td></tr>
		    <tr><td>Cathedral seating - 4 sq. ft. per person</td></tr>
		    <tr><td>Buffet Table - 100 sq. ft.</td></tr>
		    <tr><td>Cake Table - 50 sq. ft.</td></tr>
		    <tr><td>Gift Table - 100 sq. ft.</td></tr>
		    <tr><td>Bar - 15 sq. ft.</td></tr>
		    <tr><td>Disc Jockey - 50 sq. ft.</td></tr>
		    <tr><td>Band 30 sq. ft. per person</td></tr>
		    <tr><td>Dance Floor - 4 sq. ft. per person</td></tr>
	    </table>
	@endif
@stop

@section('js')
	<script type="text/javascript">
		$(function(){
			$('.product .proceed').on('click', function(){
				if($.trim($(this).closest('.product').find('.quantity').val()) == '') return false;
			});
		});
	</script>
	@include('front.js.lightbox')
@stop