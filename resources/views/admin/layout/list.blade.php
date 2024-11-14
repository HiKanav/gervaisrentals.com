@extends('admin.layout.base')

@section('page-level-css')
    <link href={{asset("default/assets/global/plugins/datatables/datatables.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("default/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("default/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css")}} rel="stylesheet" type="text/css" />
@stop

@section('page-content')
	<div class="row">
	    <div class="col-md-12">
	        <!-- BEGIN LISTING TABLE-->
	        <div class="portlet light ">
				<div style="margin:20px;">
					@yield('portlet_header')
				</div>
	            <div class="portlet-title">
	                <div class="caption font-dark">
	                    <span class="caption-subject bold uppercase">@yield('subject')</span>
	                    @yield('extra-btn')
	                </div>
	                <div class="tools"> </div>
	            </div>
	            <div class="portlet-body">
					@yield('portlet_body')
	                <table class="table table-striped table-bordered table-hover" id="category_index">
	                    @yield('table-content')
	                </table>
	                @yield('tfoot')
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