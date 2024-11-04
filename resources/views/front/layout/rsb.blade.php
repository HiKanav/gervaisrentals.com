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
						
						<hr>
						<div class="text-center">
							<h5>Current Weather</h5>
							{{-- <div>
							    <object type="application/x-shockwave-flash" data="http://swf.yowindow.com/yowidget3.swf" width="220" height="150">
							    	<param name="movie" value="http://swf.yowindow.com/yowidget3.swf"/>
							    	<param name="allowfullscreen" value="true"/>
							    	<param name="wmode" value="opaque"/>
							    	<param name="bgcolor" value="#FFFFFF"/>
							    	<param name="flashvars" 
							    	value="location_id=gn:6167865&amp;location_name=Toronto&amp;time_format=12&amp;unit_system=custom&amp;u_temperature=c&amp;u_wind_speed=mph&amp;u_pressure=in&amp;u_pressure_level=sea&amp;u_distance=mile&amp;u_rain_rate=in&amp;background=#FFFFFF&amp;mini_action=window&amp;copyright_bar=false"
							    />
							    </object>
							</div>
							<hr> --}}
							<div id="plemx-root"></div>
							<div id="mc_embed_signup" style="margin-top: 15px;">
							    <form action="https://gervaisrentals.us4.list-manage.com/subscribe/post?u=ea21455c1157acd54de313f47&amp;id=f478b017fd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							        <div id="mc_embed_signup_scroll">
							           
							            <div class="mc-field-group">
							                <input type="email" value="" name="EMAIL" class="required email aign_media_sidebar" id="mce-EMAIL" placeholder="Enter email" style="width: 62%; border-radius: 0; height: 40px; padding: 11px;">
							                <div style="position: absolute; left: -5000px;" aria-hidden="true">
							                	<input type="text" name="b_ea21455c1157acd54de313f47_f478b017fd" tabindex="-1" value="">
							                </div>
						            		<div class="clear">
						            			<input type="submit" value="Subscribe" name="subscribe" style="height: 40px; margin-left: -6px;" id="mc-embedded-subscribe" class="button">
						            		</div>
							            </div>
							            <div id="mce-responses" class="clear">
							                <div class="response" id="mce-error-response" style="display:none"></div>
							                <div class="response" id="mce-success-response" style="display:none"></div>
							            </div>
							            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							          
							        </div>
							    </form>
							</div>
							<hr>
							
						</div>
						{{-- <div style="width: 220px; height: 15px; font-size: 14px; font-family: Arial,Helvetica,sans-serif;">
							<span style="float:left;"><a target="_top" href="http://WeatherScreenSaver.com?client=widget&amp;link=copyright" style="color: #2fa900; font-weight:bold; text-decoration:none;" title="Free Weather Widget">YoWindow.com</a></span>
							<span style="float:right; color:#888888;"><a href="http://yr.no" style="color: #2fa900; text-decoration:none;">yr.no</a></span>
						</div> --}}

	                    <div class="brands-name">
	                        <ul class="nav nav-pills nav-stacked subscribe-list">
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


	<script type="text/javascript"> 

	var _plm = _plm || [];
	_plm.push(['_btn', 55009]); 
	_plm.push(['_loc','caon0696']);
	_plm.push(['location', document.location.host ]);
	(function(d,e,i) {
	if (d.getElementById(i)) return;
	var px = d.createElement(e);
	px.type = 'text/javascript';
	px.async = true;
	px.id = i;
	px.src = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/js/btn/pelm.js?orig=en_ca';
	var s = d.getElementsByTagName('script')[0];

	var py = d.createElement('link');
	py.rel = 'stylesheet'
	py.href = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/styles/btn/styles.css'

	s.parentNode.insertBefore(px, s);
	s.parentNode.insertBefore(py, s);
	})(document, 'script', 'plmxbtn');</script>
@stop