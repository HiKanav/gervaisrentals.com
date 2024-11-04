@extends('front.layout.rsb')

@section('title')Contact Us @stop

@section('meta-title')Party & Event Rental Supply Company | Gervais Party Rentals @stop
@section('meta-description')Only Work With The Best With Party & Event Rentals From Gervais Party Rentals.  Contact Us Today To Get A Quote 1-888-437-8247.@stop

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
@stop

@section('left-content')
	<h2>Party Rental Supply Company</h2>
	<p> If you're researching party rental companies, with the goal of finding an affordable, experienced party rental specialist that can provide high quality furnishings, tents, dishware, linens and other essential event accessories, look no further than Gervais Party & Tent Rental. Gervais is the name that Toronto event planners have known and recommended for years! Our event rental company has been in business since 1949, supplying event planners, brides and many others with the items they need to host memorable, beautiful and affordable weddings, backyard and outdoor weddings, banquets, charity events, tradeshows and more. </p>
	
	<p> Our items are attractive, well-maintained and of the highest quality, while our customer service is simply second to none. Your selected items will be promptly delivered to your venue by our professional and courteous drivers. If you require to have your equipment set up for you, this service is available upon request, for an additional fee. </p>

	<p> Gervais Party and Tent Rental is conveniently located in the Eastern part of the GTA, and provides service throughout all of Southern Ontario.</p>

	<p>For general questions about our party and tent rental supply company, please feel free to submit our contact form, also visit our Gallery page or FAQ's page . Are you looking for a price quote? Please browse through our list of items, make your selections and then submit an online quote request. </p>

	<p> Have you decided that our party rental business is the right one for your needs? Call <strong><a href="tel:4162881846">416-288-1846</a></strong> today.</p>
	<hr>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="well" style="font-size: 15px; padding: 15px; margin-bottom: 0px;">Inadvertently sometimes technical difficulties arise, if you have not been contacted within 24 hours please feel free to reach out and email us at <a href="mailto:sales@gervaisrentals.com?subject=Custom Package Request">sales@gervaisrentals.com</a></div>
        </div>
    </div>
    <hr>
	{!!Form::open(['action' => 'Front\PageController@postSendQuote', 'id' => 'form'])!!}
		@include('front.partials._contact-us')
        {!! Form::hidden('contact_us', true) !!}
	{!!Form::close()!!}
	<hr>
	<div class="row">
        <div class="col-md-7">
            <iframe width="100%" height="350" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2880.4855047849614!2d-79.25310418519129!3d43.78353775201188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4d103f828e859%3A0xa18fbe44e7b88018!2sGervais+Party+and+Tent+Rental!5e0!3m2!1sen!2sin!4v1462152988184" marginwidth="0" marginheight="0" scrolling="no"></iframe>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Address</strong><br>
                        Gervais Rentals,<br>
                        75 Milner Ave,<br>
                        Scarborough, ON,<br>
                        M1S 3P6,<br>
                        (McCowan &amp; 401)<br>
                        {{-- CT21 5SH<br> --}}
                    </address>
                </div>
                <div class="col-xs-6">
                    <address>
                        <strong>Toronto Region</strong><br>
                        <a href="tel:4162881846">416-288-1846</a><br>
                        <strong>Durham Region</strong><br>
                        <strong>Toll Free: </strong>1-888-GERVAIS<br>
                        <strong>Fax: </strong><a href="tel:4162889648">416-288-9648</a><br>
                        <a href="mailto:sales@gervaisrentals.com" class="text-lowercase">sales@gervaisrentals.com</a>
                    </address>
                </div>
            </div>
            <div class="new-logo">
                <a href="https://gervaisrentals.com">
                    <img src="https://gervaisrentals.com/default/front/imgs/75-year-gervaise.jpg" alt="Logo" style="width: 200px">
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center lead text-info">"Our humble fleet ready & willing to serve you"</p>
            <img src="{{asset('imgs/contact-us.jpg')}}" alt="" class="img-responsive img-circle">
        </div>
    </div>
    <style>
        .new-logo {
            display: flex;
            justify-content: center;
        }
    </style>
@stop

@section('js')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src={{asset("default/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}} type="text/javascript"></script>
    <script type="text/javascript">
		$(function(){
            $("#form").validate(/*{
                "hiddenRecaptcha": {
                     required: function() {
                         if(grecaptcha.getResponse() == '') {
                             return true;
                         } else {
                             return false;
                         }
                     }
                }
            }*/);
		    $('#event_at').datetimepicker({
		        format: 'YYYY-MM-DD HH:mm',
		        sideBySide: true
		    });
			
		});
	</script>
@stop