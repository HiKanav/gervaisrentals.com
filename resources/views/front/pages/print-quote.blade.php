<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
	<title>Gervais Rental Quote #{{$quote->id}}</title>
	<link href={{asset("default/assets/global/plugins/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" type="text/css" />
	<link href={{asset("default/assets/global/plugins/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="{{asset('default/front/css/style.css')}}">

</head>
<body>
	<div class="container">
		<div class="row">
			@if(Session::has('noti'))
			    <div class="no-print alert alert-{{Session::get('noti')['type']}} fade in col-md-6 col-md-offset-3">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			        <strong>{{ Session::get('noti')['msg'] }}</strong>
			    </div>
			@endif
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">@if($quote->has_products)Gervais Rental Quote #{{$quote->id}} @else Contact Us @endif</h2>
				<hr>
				<div class="row text-center">
		            <div class="col-xs-4">
		                <address>
		                    <strong>Address</strong><br>
		                    Gervais Rentals,<br>
		                    75 Milner Ave,<br>
		                    Scarborough, ON,<br>
		                    M1S 3P6,<br>
		                    (McCowan &amp; 401)<br>
		                    CT21 5SH<br>
		                </address>
		            </div>
		            <div class="col-xs-4">
	                    <img src="{{asset('imgs/logo.png')}}" alt="">
	                </div>
		            <div class="col-xs-4">
		                <address>
		                    <strong>Toronto Region</strong><br>
		                    416-288-1846<br>
		                    <strong>Durham Region</strong><br>
		                    905-426-RENT<br>
		                    905-426-7368<br>
		                    <strong>Toll Free: </strong>1-888-GERVAIS<br>
		                    <strong>Fax: </strong>416-288-9648<br>
		                    <strong>Email: </strong>sales@gervaisrentals.com
		                </address>
		            </div>
		        </div>
				
				<div class="well">
					<p>No payment is involved, this system is designed to give you an online quote only, please call <b>416-288-1846</b> if you would like to place an order.</p>
					<p>Shipping charges are determined by the size of your order and your location. Please contact our office for more information at <b>416-288-1846</b></p>
					<p><b>Customer Service Hours: </b>Monday to Friday 9 am - 5pm, Saturday 10 am - 2pm, Sunday we are closed.</p>
					<p>Inadvertently sometimes technical difficulties arise, if you have not been contacted within 24 hours please feel free to reach out and email us at <b>sales@gervaisrentals.com</b></p>
				</div>

				<table class="table table-responsive">
					<thead>
						<tr class="info">
			    			<th colspan="2" class="text-center lead">Customer Information</th>
			    		</tr>
					</thead>
					<tbody>
						<tr>
							<th>Name: </th>
							<td>{{$quote->name}}</td>
						</tr>
						<tr>
							<th>Company Name: </th>
							<td>{{$quote->company_name}}</td>
						</tr>
						<tr>
							<th>Email: </th>
							<td>{{$quote->email}}</td>
						</tr>
						<tr>
							<th>Phone: </th>
							<td>{{$quote->phone}}</td>
						</tr>
<!-- 						@if(!empty($quote->company_name))
						<tr>
							<th>Address: </th>
							<td>{{$quote->company_name}}</td>
						</tr>
						@endif -->
						<tr>
							<th>Type Of Event: </th>
							<td>{{$quote->event_type}}</td>
						</tr>
						<tr>
							<th>Date of Event : </th>
							<td>{{$quote->event_at}}</td>
						</tr>
						<tr>
							<th>Start Time: </th>
							<td>{{$quote->event_start}}</td>
						</tr>
						<tr>
							<th>End Time: </th>
							<td>{{$quote->event_end}}</td>
						</tr>
						@if(!empty($quote->venue_name))
							<tr>
								<th>Venue Name: </th>
								<td>{{$quote->venue_name}}</td>
							</tr>
						@endif

						<tr>
							<th>Major Road Intersection:</th>
							<td>{{ $quote->major_intersections }}</td>
						</tr>

						<tr>
							<th>Delivery Postal Code: </th>
							<td>{{$quote->delivery_postal_code}}</td>
						</tr>
						<tr>
							<th>No. of Guests: </th>
							<td>{{$quote->no_of_guests}}</td>
						</tr>
						<tr>
							<th>Delivery on Elevator required </th>
							<td>
								@if($quote->delivery_on_elevator)
								  	Yes
								@else
								  	No
								@endif
							</td>
						</tr>
						@if(!empty($quote->loading_dock_instructions))
						<tr>
							<th>Loading Dock Instructions: </th>
							<td>{{$quote->loading_dock_instructions}}</td>
						</tr>
						@endif
						<tr>
							<th>Message: </th>
							<td>{{$quote->message}}</td>
						</tr>
						<tr>
							<th>How would you like to proceed further?: </th>
							<td>
								@if($quote->request_type == 'place_order')
									Would like to proceed and place the order
								@else
								  Quote Inquiry only
								@endif
							</td>
						</tr>
					</tbody>
				</table>
				
				<div class="table table-responsive">
					<table class="table">
						@if($quote->has_products)
							<thead>
								<tr class="info">
					    			<th colspan="4" class="text-center lead">Products Information</th>
					    		</tr>
					            <tr>
					                <th class="col-md-6">Product</th>
					                <th class="col-md-2">QTY</th>
					                <th class="col-md-2">Unit Price</th>
					                <th class="col-md-2">Total Price</th>
					            </tr>
				            </thead>
					        <tbody>
								<?php $price = 0; ?>
								@foreach($productDetails as $product)
						            <tr>
						                <td><i>{{$product->name}}</i></td>
						                <td>{{$productQuantity[$product->id]}}</td>
						                <td>{{'$'.number_format((float)$product->price, 2, '.', '')}}</td>
						                <td>{{'$'.number_format((float)$product->price * $productQuantity[$product->id], 2, '.', '')}}</td>
						            </tr>
						        	<?php $price += ($product->price * $productQuantity[$product->id]); ?>
					            @endforeach
					            <tr>
					                <th colspan="2"></th>
					                <th><span class="pull-right">Sub Total</span></th>
					                <th>{{'$'.number_format((float)$price, 2, '.', '')}}</th>
					            </tr>
					            
					            @if($price)
				            		<?php $extraChargeTotal = 0; ?>
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
					    @endif
				            <tr class="no-print">
				                <td colspan="4">
				                	<a href="javascript:" class="btn btn-primary pull-left" onclick="window.print()">Print</a>
				                	<a href="{{action('Front\PageController@getRentals')}}" class="btn btn-primary pull-right">Continue Shopping</a>
				                </td>
				            </tr>
				            <tr class="clearfix"></tr>
				        </tbody>
				    </table>          
				</div>
			</div>
		</div>
	</div>

	<script src={{asset("default/assets/global/plugins/jquery.min.js")}} type="text/javascript"></script>
	<script src={{asset("default/assets/global/plugins/bootstrap/js/bootstrap.min.js")}} type="text/javascript"></script>
	<script src={{asset("default/front/js/base.js")}} type="text/javascript"></script>
	@include('front.partials._analytic')
</body>
</html>