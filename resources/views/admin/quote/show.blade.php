@extends('admin.layout.base')

@section('title') Quote Products @stop

@section('page-level-css')
    <link href={{asset("default/assets/global/plugins/datatables/datatables.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("default/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("default/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css")}} rel="stylesheet" type="text/css" />
@stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\QuoteController@index')}}">Quotes</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>View</span>
    </li>
@stop

@section('page-content')
	<div class="row">
	    <div class="col-md-12">
	        <!-- BEGIN LISTING TABLE-->
	        <div class="portlet light ">
	            <div class="portlet-title">
	                <div class="caption font-dark">
	                    <span class="caption-subject bold uppercase">Quotes</span>
	                </div>
	                <div class="tools"> </div>
	            </div>
	            <div class="portlet-body">
	                <table class="table table-striped table-bordered table-hover" id="category_index">
	                    <thead>
	                        <tr>
	                            <th> Product Id </th>
	                            <th> Code </th>
	                            <th> Name </th>
	                            <th> Price </th>
	                            <th> Quantity </th>
	                            <th> Total </th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($quote->products as $product)
								<tr>
		                            <td> {{ $product->productDetail->id }} </td>
		                            <td> {{ $product->productDetail->code }} </td>
		                            <td> {{ $product->productDetail->name }} </td>
		                            <td> {{ $product->productDetail->price }} </td>
		                            <td> {{ $product->quantity }} </td>
		                            <td> {{ $product->productDetail->price*$product->quantity }} </td>
		                        </tr>
	                        @endforeach
	                        <tr>
	                        	<td colspan="5" class="text-center"><strong>Total</strong></td>
	                        	<td><strong>{{$quote->totalPrice()}}</strong></td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <!-- END LISTING TABLE-->
	    </div>
	</div>
@stop

@section('page-level-js-plugins')
	<script src={{asset("default/assets/global/scripts/datatable.js")}} type="text/javascript"></script>
	<script src={{asset("default/assets/global/plugins/datatables/datatables.min.js")}} type="text/javascript"></script>
	<script src={{asset("default/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js")}} type="text/javascript"></script>
	<script src={{asset("default/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}} type="text/javascript"></script>
@stop

@section('page-level-js')
	<script src={{asset("default/assets/pages/scripts/table-datatables-buttons.js")}} type="text/javascript"></script>
@stop