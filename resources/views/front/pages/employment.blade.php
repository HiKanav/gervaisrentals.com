@extends('front.layout.rsb')

@section('title')Employment Opportunities @stop
@section('css')
	<style>
		.section .title-area {
  max-width: 760px;
  margin: 0 auto 70px;
  display: block;
  padding: 0 15px;
  text-align: center;
}
h2, .h2 {
	font-size: 2.4em;
	line-height: 1.25;
	margin: 0.4em 0;
	font-weight: bold;
}
.separator::before, .separator::after {
	display: block;
	width: 40%;
	content: " ";
	margin-top: 10px;
	border: 1px solid #c5a47e;
}
.separator::after {
	float: right;
}
.separator::before {
	float: left;
}
.separator {
	color: #c5a47e;
	margin: 0 auto 20px;
	max-width: 406px;
	text-align: center;
	position: relative;
}
p, label, .btn, .form-control, .title h5, .navbar, .brand, .btn-simple, a, .td-name, td, small, .media h5, .subtitle {
	font-family: "Poppins", "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.description {
	margin-bottom: 1px;
}
.section .title-area .description {
	font-size: 18px;
	color: #777777;
}
.info-icon .icon {
	font-size: 62px;
	line-height: 66px;
	color: #c5a47e;
}
.info-icon {
	text-align: center;
	padding-bottom: 50px;
}
	</style>
@stop
@section('left-content')
	 <div class="section">
        <div class="">
            <div class="row">
                <div class="title-area">
                    <h2>Employment Opportunities</h2>
                    <div class="separator separator-danger">✻</div>
                    <p class="description">These are exciting and fast changing times in the event industry
	We are always looking for quality, quick thinking positive team members.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="fa fa-car"></i>
                        </div>
                        <h3>Drivers</h3>
                        <p class="description"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="fa fa-truck"></i>
                        </div>
                        <h3>Driver Helpers</h3>
                        <p class="description"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="fa fa-home"></i>
                        </div>
                        <h3>Warehouse help</h3>
                        <p class="description"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="fa fa-group"></i>
                        </div>
                        <h3>Set up crews</h3>
                        <p class="description"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="fa"><img src="{{asset('default/front/imgs/kitchen.png')}}"></i>
                        </div>
                        <h3>Dishwashers</h3>
                        <p class="description"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="title-area">
        	<p class="description">Please submit your resume to 
			<a href="mailto:employment@gervaisrentals.com">employment@gervaisrentals.com</a></p>
		</div>
		</div>
    </div>
@stop