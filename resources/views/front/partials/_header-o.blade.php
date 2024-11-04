<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-4 pull-right search">
                    <div id="newtab-search-icon"></div>
                    <div class="input-group search-box">
                        @include('front/partials._search')
                    </div>
                </div>
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle Navigation</span> 
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a href="{{action('Front\PageController@getIndex')}}" class="navbar-brand"><img src="{{asset('default/front/imgs/logo.png')}}" alt="Logo"></a> </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{action('Front\PageController@getIndex')}}">Home</a></li>
                            <li class="dropdown"> 
                                <a href="{{action('Front\PageController@getAbout')}}" class="dropdown-toggle disabled" data-toggle="dropdown">ABOUT US <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{action('Front\PageController@getMission')}}">MISSION</a></li>
                                    <li><a href="{{action('Front\PageController@getCaterers')}}">OUR CATERER'S</a></li>
                                    <li><a href="{{action('Front\PageController@getTestimonials')}}">TESTIMONIALS</a></li>
                                    <li><a href="{{action('Front\PageController@getReviews')}}">REVIEWS</a></li>
                                    <li><a href="{{action('Front\PageController@getAcknowledgements')}}">ACKNOWLEDGEMENTS</a></li>
                                    <li><a href="{{asset('imgs/Customer-Creed.pdf')}}">CUSTOMER CREED</a></li>
                                </ul>
                            </li>
                            <li><a href="{{action('Front\PageController@getRentals')}}">RENTALS</a></li>
                            <li><a href="{{action('Front\PageController@getFaq')}}"> FAQ’S</a></li>
                            <li><a href="{{action('Front\PageController@getSitemap')}}"> SITE MAP </a></li>
                            <li><a href="http://gervaisrentals.wordpress.com" target="_blank"> Blog </a></li>
                            <li><a href="{{action('Front\PageController@getContactUs')}}"> CONTACT US</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@if(Session::has('noti'))
    <div class="alert alert-{{Session::get('noti')['type']}} fade in col-md-4 col-md-offset-4">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('noti')['msg'] }}</strong>
    </div>
@endif