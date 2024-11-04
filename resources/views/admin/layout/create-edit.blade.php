@extends('admin.layout.base')

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\CategoryController@index')}}">Categories</a></span>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>New</span>
    </li>
@stop

@section('page-content')
	<div class="row">
	    <div class="col-md-12">
	        <!-- BEGIN LISTING TABLE-->
	        <div class="portlet light ">
	            <div class="portlet-title">
	                <div class="caption font-dark">
	                    <span class="caption-subject bold uppercase">@yield('subject')</span>
                        <a href="@yield('all-link')" class="btn purple-sharp btn-outline sbold uppercase">All</a>
	                </div>
	                <div class="tools"> </div>
	            </div>
	            <div class="portlet-body">
	            	@yield('form')
	            </div>
	        </div>
	        <!-- END LISTING TABLE-->
	    </div>
	</div>
@stop

@section('page-level-css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css">
@endsection

@section('page-level-js-plugins')
	<script src={{asset("default/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}} type="text/javascript"></script>
	<script src={{asset("default/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}} type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.min.js"></script>
@stop

@section('page-level-js')
	<script type="text/javascript">
		$(function(){
			$("#form").validate({
				rules: {
					sort_order: {
						digits: true
					},
					price: {
						number: true
					},
					pst: {
						number: true
					},
					gst: {
						number: true
					},
					shipping: {
						number: true
					},
				}
			});

			$('#summernote').summernote({ height: 300});
		});
	</script>
@stop