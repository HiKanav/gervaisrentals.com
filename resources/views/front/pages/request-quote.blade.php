@extends('front.layout.rsb')

@section('title')Shopping Cart @stop

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('left-content')
	<h2>Shopping Cart</h2>
	
	
	<div class="well"><p>No payment is involved, this system is designed to give you an online quote only, please call <b>416-288-1846</b> if you would like to place an order. </p>Shipping charges are determined by the size of your order and your location. Please contact our office for more information at <b>416-288-1846</b></div>

	<div class="table-responsive">
		<table class="table">
			<thead>
	            <tr>
	                <th class="col-md-6">Product</th>
	                <th class="col-md-2">QTY</th>
	                <th class="col-md-2">Unit Price</th>
	                <th class="col-md-2">Total Price</th>
	            </tr>
            </thead>
	        <tbody>
				<?php $price = 0; ?>
				{!!Form::open(['action' => 'Front\PageController@postRequestQuote'])!!}
					@foreach($productDetails as $product)
			            <tr>
			                <td><i>{{$product->name}}</i></td>
			                <td><input type="number" min="{{$product->min}}" max="{{$product->max}}" step="{{$product->step}}" class="form-control" value="{{$productQuantity[$product->id]}}" name="product_quantity[{{$product->id}}]"></td>
			                <td>{{'$'.number_format((float)$product->price, 2, '.', '')}}</td>
			                <td>{{'$'.number_format((float)$product->price * $productQuantity[$product->id], 2, '.', '')}}</td>
			            </tr>
			            <tr>
			            	<td colspan="4">
								<div class="row">
									@if($product->thumbnail_location_1 && File::exists(public_path().'/'.$productLocation.'/'.$product->thumbnail_location_1))
								      <div class="col-xs-2"><a data-toggle="lightbox" class="thumbnail" data-gallery="multiimages" href="{{asset($productLocation.'/'.$product->image_location_1)}}"><img alt="Img" src="{{asset($productLocation.'/'.$product->thumbnail_location_1)}}"></a></div>
								    @endif
									@if($product->thumbnail_location_2 && File::exists(public_path().'/'.$productLocation.'/'.$product->thumbnail_location_2))
								        <div class="col-xs-2">
							      			@if($product->thumbnail_image_2 && File::exists(public_path().'/'.$productLocation.'/'.$product->image_location_2))
			                                  		<a class="thumbnail" href="{{asset($productLocation.'/'.$product->image_location_2)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
		                                  	@else
		                                  		<a class="thumbnail" href="{{asset($productLocation.'/'.$product->thumbnail_location_2)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
		                                  	@endif
		                                  	<img alt="Img" src="{{asset($productLocation.'/'.$product->thumbnail_location_2)}}"></a>
							      		</div>
									@endif
									@if($product->thumbnail_location_3 && File::exists(public_path().'/'.$productLocation.'/'.$product->thumbnail_location_3))
								        <div class="col-xs-2">
								      		@if($product->thumbnail_image_3 && File::exists(public_path().'/'.$productLocation.'/'.$product->image_location_3))
				                                  		<a class="thumbnail" href="{{asset($productLocation.'/'.$product->image_location_3)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
		                                  	@else
												<a class="thumbnail" href="{{asset($productLocation.'/'.$product->thumbnail_location_3)}}" rel="{{$product->id}}" data-gallery="multiimages" data-toggle="lightbox">
		                                  	@endif
		                                  	<img alt="Img" src="{{asset($productLocation.'/'.$product->thumbnail_location_3)}}"></a>
								        </div>
									@endif
							    </div><!--.row-->
			            	</td>
			            </tr>
			        	<?php $price += ($product->price * $productQuantity[$product->id]); ?>
		            @endforeach
		            <tr>
		                <th colspan="2"><span class="pull-right">@if($price)<input class="btn btn-sm btn-info" type="submit" value="Update Quantity">@endif</span></th>
		                <th><span class="pull-right">Sub Total</span></th>
		                <th>{{'$'.number_format((float)$price, 2, '.', '')}}</th>
		            </tr>
	            {!!Form::close()!!}
        		<?php $extraChargeTotal = 0; ?>
	            @if($price)
		            @foreach($extraCharges as $extraCharge)
			            <tr>
			            	<?php $extraChargePrice = $extraCharge->is_percent ? ($extraCharge->price*$price)/100 : $extraCharge->price; ?>

			                <th colspan="3"><span class="pull-right text-capitalize">{{$extraCharge->name}}</span></th>
			                <th>{{'$'.number_format($extraChargePrice, 2, '.', '')}}</th>
			            </tr>
			            <?php $extraChargeTotal += $extraChargePrice; ?>
		            @endforeach
		            <?php $price += $extraChargeTotal; ?>
	            @endif
	            <tr>
	                <th colspan="3"><span class="pull-right">Total</span></th>
	                <th>{{'$'.number_format((float)$price, 2, '.', '')}}</th>
	            </tr>
	            <tr>
	                <td colspan="4"><a href="{{action('Front\PageController@getRentals')}}" class="btn btn-primary">Continue Shopping</a></td>
	            </tr>
	        </tbody>
	    </table>          
	</div>
	@if($price)
		<div class="row">
		    <div class="col-sm-10 col-sm-offset-1">
				<div class="well">When you have finalized your quote, please complete the form below and we will send you a copy by email.<br><br>
				Inadvertently sometimes technical difficulties arise, if you have not been contacted within 24 hours please feel free to reach out and email us at <a href="mailto:sales@gervaisrentals.com ">sales@gervaisrentals.com</a>
				</div>
		    </div>
		</div>

		{!!Form::open(['action' => 'Front\PageController@postSendQuote', 'id' => 'form'])!!}
			@include('front.partials._contact-us')
		{!!Form::close()!!}
	@endif
@stop

@section('js')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
	<script src={{asset("default/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}} type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" type="text/javascript"></script>
    <script type="text/javascript">
		$(function(){
			var $form = $("#form"),
			$deliveryType = $('[name="delivery_type"]'),
			$deliveryOptions = $('[name="delivery_options"]');

			$orderType = $('[name="request_type"]');

			$orderType.on('change', toggleOrderOptions)

			$form.on('submit', restrictIfNotMinimum);
			$deliveryType.on('change', toggleDeliveryOptions);
			$("#form").validate();
		    $('#event_at').datetimepicker({
		        format: 'YYYY-MM-DD',
		        // format: 'YYYY-MM-DD HH:mm',
		        // sideBySide: true
		    });

		    function toggleDeliveryOptions(e) {
		    	$this = $(this);
		    	$deliveryOptions.parent().toggle($this.val() == 'delivery');
		    }

			function toggleOrderOptions(e) {
				// $("#form").validate()
		    }

		    function restrictIfNotMinimum(e) {

				var minPrice = $deliveryType.filter(':checked').val() == 'delivery' ? $deliveryOptions.find(':selected').data('min-price') : 25;

		    	if("{{$price - $extraChargeTotal}}" < minPrice) {
		    		swal('Error', 'Minimum Quote Price is $' + minPrice, 'error');
		    		return false;
		    	}
		    }
			
		});
	</script>
	@include('front.js.lightbox')
@stop