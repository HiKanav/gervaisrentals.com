<footer>
    <div class="container">
        <div class="row">
            <div class="contact-col col-md-3 col-sm-3 col-xs-12">
                <div class="footer-logo"> <img src="{{asset('default/front/imgs/footer-logo.png')}}" alt=""> </div>
            </div>
            <div class="latest-col col-md-3 col-sm-3 col-xs-12">
                <h3>Contact & Location</h3>
                <p> Phone: 416-288-1846<br/>
                    Fax: &nbsp;&nbsp;&nbsp;&nbsp;416-288-9648 <br/>
                    Email: &nbsp;sales@gervaisrentals.com <br/>
                    75 Milner Ave. <br/>
                    Scarborough. ON M1S 3P6 </p>
            </div>
            <div class="tweets-col col-md-3 col-sm-3 col-xs-12">
                <h3>Links</h3>
                <ul>
                    <li> <a href="{{action('Front\PageController@getVideos')}}">Watch our Video</a></li>
                    <li><a href="{{action('Front\PageController@getGallery')}}">Visit our Gallery</a></li>
                    <li><a href="{{action('Front\PageController@getTentSize')}}">What Size tent do i need?</a></li>
                    <li><a href="{{action('Front\PageController@getHoursOfOperation')}}">Hours of Operation</a></li>
                    <li><a href="{{action('Front\PageController@getDelivery')}}">Delivery</a></li>
                    <li><a href="https://gervaisrentals.wordpress.com/" target="_blank">Blog</a></li>
                </ul>
            </div>
            <div class="tweets-col social col-md-2 col-sm-3 col-xs-12">
                <h3>Social</h3>
                <ul>
                    <li> <a href="https://www.facebook.com/pages/Gervais-Party-and-Tent-Rentals/170858892957079">Facebook</a> </li>
                    <li><a href="http://twitter.com/#!/gervaisrentals">Twitter</a></li>
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
                    <p class="copy_text">@ {{date('Y')}} www.gervaisrentals.com All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>