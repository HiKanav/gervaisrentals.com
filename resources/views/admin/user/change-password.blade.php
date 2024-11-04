@extends('admin.layout.base')

@section('title') Change Password @stop

@section('page-level-css')
@stop

@section('breadcrumbs')
    <li>
        <span><a href="{{action('Admin\UserController@getChangePassword')}}">Change Password</a></span>
    </li>
@stop

@section('page-content')
	<div class="row">
	    <div class="col-md-12">
	        <!-- BEGIN LISTING TABLE-->
	        <div class="portlet light ">
	            <div class="portlet-title">
	                <div class="caption font-dark">
	                    <span class="caption-subject bold uppercase">Edit</span>
	                </div>
	                <div class="tools"> </div>
	            </div>
	            <div class="portlet-body">
					{!!Form::open(['action' => 'Admin\UserController@postChangePassword', 'class' => 'form-horizontal', 'id' => 'form'])!!}
						@include('admin.partials.user._change-password-form-fields')
					{!!Form::close()!!}
	            </div>
	        </div>
	        <!-- END LISTING TABLE-->
	    </div>
	</div>
@stop

@section('page-level-js-plugins')
	<script src={{asset("default/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}} type="text/javascript"></script>
@stop

@section('page-level-js')
	<script type="text/javascript">
	$(function(){
		$("#form").validate({
			rules: {
				password: {
					minlength: 5,
					maxlength: 30,
				},
				password_confirmation: {
					minlength: 5,
					maxlength: 30,
					equalTo: "#password"
				},
			},
			messages: {
				password_confirmation: {
				equalTo: "Passwords doesn't match."
				}
			}
		});
	});
	</script>
@stop