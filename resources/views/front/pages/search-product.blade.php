@extends('front.layout.rsb')

@section('title'){{$query}} @stop

@section('left-content')
	<h2>Search results for {{$query}}</h2>
	@if($category->count())
		<section class="products-listing">
			<hr>
		    <div class="row">
		        <div class="col-sm-4"><p class="lead"></p></div>
		        <div class="col-sm-4"><p class="lead">Category</p></div>
		    </div>
		    @foreach($category as $categoryData)
		    	<hr>
		    	<div class="row">
			    	<div class="col-sm-4">
			    		<div class="row">
			    			<div class="col-md-12">
			    				<div class="carousel slide" id="Carousel">
			    					<div class="item active">
		                                <div class="row">
		                                	@if($categoryData->thumbnail_url)
											    <div class="col-xs-4"><a class="thumbnail" href="{{$categoryData->thumbnail_url}}" data-gallery="multiimages" data-toggle="lightbox"><img style="max-width:100%;" alt="Img" src="{{$categoryData->thumbnail_url}}"></a></div>
											@endif
		                                </div><!--.row-->
			                        </div><!--.item-->
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="col-sm-4"><p><i>{{$categoryData->name}}</i></p></div>
			    	<div class="col-sm-4">
			    		<div class="row product">
			    			<div class="col-sm-4 col-sm-offset-0">
			    			</div>
				    		<span class="hidden-sm hidden-md hidden-lg"><br></span>
			                <div class="col-sm-5 text-left">
			                   <button onClick="javascript: window.location='{{$categoryData->route_name}}'" class="btn btn-primary proceed">View Products</button>
			                </div>
		            	</div>
			    	</div>
			    </div>
		    @endforeach 
		</section>
	@endif
	<br><br>
	@if($products->count())
		<section class="products-listing">
		    <hr>
		    <div class="row">
		        <div class="col-sm-4"><p class="lead">Product</p></div>
		        <div class="col-sm-4"><p class="lead">Price</p></div>
		        <div class="col-sm-4 text-center"><p class="lead">Quantity</p></div>
		    </div>
		    {!!Form::open(['action' => 'Front\PageController@postRequestQuote'])!!}
			    @foreach($products as $product)
			    <hr>
			    <div class="row">
			        <div class="col-sm-4">
			            <p><i>{{$product->name}}</i></p>
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="carousel slide" id="Carousel">
			                     
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
			                        <input type="number" min=0 aria-describedby="sizing-addon1" placeholder="#" class="form-control quantity" name="product_quantity[{{$product->id}}]" @if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) value="{{ Session::get('product_quantity')[$product->id] }}" @endif>
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
	@if(!$category->count() && !$products->count())
		<h4 class="text-center">No Products</h4>
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