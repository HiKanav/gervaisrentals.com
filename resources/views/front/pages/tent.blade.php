@extends('front.layout.rsb')

@section('title')What size tent do i need? @stop

@section('left-content')
    <h2>Tent Categories</h2>

	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			<p class="lead"><a href="{{action('Front\PageController@getTentPictures')}}">Tent Images</a></p>
			<p class="lead"><a href="{{action('Front\PageController@getCategoryProducts', [$tentPackages->route_name])}}">Tent Packages</a></p>
			<p class="lead"><a href="{{action('Front\PageController@getCategoryProducts', [$flooring->route_name])}}">Flooring</a></p>
		</div>
	</div>
	
	<hr>
    {{--<p>Gervais Party And Tent Rentals Ltd - Scarborough</p>
            <p><a href="{{asset($tentSizeLocation.'/'.'Gervais-Tent-Sizing.pdf')}}">Download</a> the pdf version of this sheet</p>--}}
    @foreach($tentCategories as $tentCategory)
    	@if($tentCategory->products->count())
		    <table class="table table-responsive table-striped">
		    	<thead>
		    		<tr class="info">
		    			<th colspan="5" class="text-center lead">{{$tentCategory->name}}</th>
		    		</tr>
		    		<tr>
						<th>SIZE/STYLE</th>
						<th>SEATING</th>
						<th>POLE DRAPES</th>
						<th>ASPHALT<br>
						CHARGES($)</th>
						<th>PRICE <br>
						INSTALLED($)</th>
					</tr>
		    	</thead>

				<tbody>
					@foreach($tentCategory->products as $product)
						<tr>
							<td>{{$product->size}}</td>
							<td>{{$product->seating}}</td>
							<td>{{$product->pole_drapes}}</td>
							<td>{{$product->asphalt_charges}}</td>
							<td>{{$product->price_installed}}</td>
						</tr>
					@endforeach
				</tbody>
		    </table>
	    @endif
	@endforeach
@stop