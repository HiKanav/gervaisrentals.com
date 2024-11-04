<footer style="padding-top:0;">
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="copy_text">Items received may not be exactly as shown</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="contact-col col-md-3 col-sm-3 col-xs-12">
                <div class="footer-logo"> <img src="{{asset('default/front/imgs/footer-logo.png')}}" alt=""> </div>
            </div>
            <div class="latest-col col-md-3 col-sm-3 col-xs-12">
                <h3>Contact & Location</h3>
                <p> Phone: <a href="tel:4162881846">416-288-1846</a><br/>
                    Fax: &nbsp;&nbsp;&nbsp;&nbsp;<a href="tel:4162889648">416-288-9648</a> <br/>
                    Email: &nbsp;<a href="mailto:sales@gervaisrentals.com" class="text-lowercase">sales@gervaisrentals.com</a> <br/>
                    75 Milner Ave. <br/>
                    Scarborough (McCowan & 401) one exit east of Kennedy Road, north off the 401. ON M1S 3P6 </p>
            </div>
            <div class="tweets-col col-md-3 col-sm-3 col-xs-12">
                <h3>Links</h3>
                <ul>
                    <li> <a href="{{action('Front\PageController@getVideos')}}">Watch our Video</a></li>
                    <li><a href="{{action('Front\PageController@getGallery')}}">Visit our Gallery</a></li>
                    <li><a href="{{action('Front\PageController@getTentSize')}}">What Size tent do i need?</a></li>
                    <!-- <li><a href="{{action('Front\PageController@getEventKawarthaLakesRentals')}}">Rentals in Kawartha Lakes</a></li>
                    <li><a href="{{action('Front\PageController@getEventRentalsCobourgPortHope')}}">Rentals in Cobourg Port Hope</a></li> -->
                    <li><a href="{{action('Front\PageController@getHoursOfOperation')}}">Hours of Operation</a></li>
                    <li><a href="{{action('Front\PageController@getDelivery')}}">Delivery</a></li>
                    <li><a href="{{action('Front\PageController@getSitemap')}}">Sitemap</a></li>
                    <li><a target="_blank" href="https://gervaisrentals.wordpress.com">Blog</a></li>
                    <li><a href="{{action('Front\PageController@getCareers')}}">Career Opportunities</a></li>
                    <li><a href="{{ asset('imgs/Terms-conditions-and-warranty-2020-v8.pdf') }}" target="_blank">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="tweets-col social col-md-2 col-sm-3 col-xs-12">
                <h3>Social</h3>
                <ul>
                    <li> <a href="https://www.facebook.com/pages/Gervais-Party-and-Tent-Rentals/170858892957079">Facebook</a> </li>
                    {{-- <li><a href="http://twitter.com/#!/gervaisrentals">Twitter</a></li> --}}
                    <li><a href="https://www.instagram.com/gervaisrentals/">Instagram</a></li>
                    <li><a href="https://www.pinterest.com/gervaisrentals/pictures/">Pinterest</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="copy_text">&copy; {{ date('Y') }} www.gervaisrentals.com All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>