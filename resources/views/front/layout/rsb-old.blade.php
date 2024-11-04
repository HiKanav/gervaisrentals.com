@extends('front.layout.base')

@section('content')
	<div class="about">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-9 about-text">
	                @yield('left-content')
	            </div>
	            
	            <div class="col-md-3">
	                <div class="brands_products"><!--brands_products-->
	                    <h2>RENTALS</h2>
	                    <div class="brands-name">
	                        <ul class="nav nav-pills nav-stacked">
	                        	@foreach($categories->sortBy('name') as $category)
	                            	<li> <a class="text-uppercase" href="{{route('category-products', [$category->route_name])}}"><span> <i aria-hidden="true" class="fa fa-angle-right"></i><i aria-hidden="true" class="fa fa-angle-right"></i> </span>{{$category->name}}</a></li>
	                        	@endforeach
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@stop