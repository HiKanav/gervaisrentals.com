<header>
    <div class="container">
        {{-- <div class="covid" align="center" style="background-color: aliceblue; padding: 15px;">
            <a href="/hirings"  style="font-size: 18px; border: none;"><u>Click here to Join our Team</u></a>
        </div> --}}
        {{-- <div class="covid" align="center" style="background-color: aliceblue; padding: 15px;">
            <a href="#" data-toggle = "modal" data-target = "#myModal" style="font-size: 18px; border: none;">Click here for our Policies and Procedures during Covid-19</a>
        </div> --}}
        <!-- Modal -->
         <div class="modal" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog " role="document">
                <div class="modal-content loader-modal">
                    <!-- <div class="modal-header">
                         <button style="margin-top: -3px; color: #a9a9a9;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img alt="" src="https://cdn.toolset.com/wp-content/plugins/wonderplugin-lightbox/engine/skins/default/lightbox-close.png">   
                        </button>
                    </div> -->
                    <div class="modal-body">
                        <button style="margin-top: -13px; color: #a9a9a9;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove-circle" style="color: black; font-size: xx-large;"></span>   
                        </button>
                        <div id="imageshift">
                            <img class="w-100" width="100%" src="https://gervaisrentals.com/imgs/covid-reopening.jpg" style="transform: scale(1.2);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End model -->
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="col-lg-4 pull-right search">

                    <div id="newtab-search-loader"></div>
                    <div id="newtab-search-icon"></div>
                    <div class="input-group search-box">
                        @include('front/partials._search')
                    </div>
                    @include('front/partials._search_results')
                </div>
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a href="{{action('Front\PageController@getIndex')}}" style="margin-left: 27px;" class="navbar-brand"><img src="{{asset('default/front/imgs/logo.png')}}" alt="Logo"></a>
                    </div>
                    <div class="container" style="width: 60%;">
                    <h3 class="pull-right" style="text-align: center;font-size: 24px;">
                        <u>Phone</u>: <a href="tel:4162881846">416-288-1846</a>&nbsp;|&nbsp;<a href="{{action('Front\PageController@getStepsToPrepareQuote')}}">Request Quote</a>@if( Session::has('product_quantity') && count(Session::get('product_quantity')) )&nbsp;|&nbsp;<a href="{{ action('Front\PageController@getRequestQuote') }}">View Quote Cart<i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="font-size: 28px; color:#08c;"></i><span class="counter"><span class="cart" style="z-index: 201; position: absolute; margin: 5px 0px 0px -15px; color: white; font-size: 14px;"><!-- {{ count(Session::get('product_quantity')) }} --></span></span></a>@endif<br>
                        <!-- Button trigger modal -->
                    <div class="emergency">
                        <span class="helpline" style="color: #073f67; text-align: center; font-size: 20px; margin-top: 20px;">
                            Showroom open Monday to Friday<br>
                            Saturday by appointment
                            <a href="#" data-toggle="modal" data-target="#exampleModalLong" style="border: none;">
                                Showroom open Monday to Friday<br>
                                Saturday by appointment
                            </a>
                        </span>
                    </div>
                    </h3>
                    </div> --}}
                    <div style="display: flex; justify-content:space-evenly; flex-wrap:wrap;" >
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <a href="{{action('Front\PageController@getIndex')}}" style="margin-left: 27px;" class="navbar-brand"><img src="{{asset('default/front/imgs/logo.png')}}" alt="Logo"></a>
                        </div>
                        <div class="container" style="width: auto;">
                            <h3 class="pull-right" style="text-align: center;font-size: 24px;">
                                <u>Phone</u>: <a href="tel:4162881846">416-288-1846</a>&nbsp;|&nbsp;<a href="{{action('Front\PageController@getStepsToPrepareQuote')}}">Request Quote</a>@if( Session::has('product_quantity') && count(Session::get('product_quantity')) )&nbsp;|&nbsp;<a href="{{ action('Front\PageController@getRequestQuote') }}">View Quote Cart<i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="font-size: 28px; color:#08c;"></i><span class="counter"><span class="cart" style="z-index: 201; position: absolute; margin: 5px 0px 0px -15px; color: white; font-size: 14px;"><!-- {{ count(Session::get('product_quantity')) }} --></span></span></a>@endif<br>
                                <!-- Button trigger modal -->
                                <div class="emergency">
                                    <a href="mailto:sales@gervaisrentals.com">
                                        <span class="helpline" style="color: #073f67; text-align: center; font-size: 20px; margin-top: 20px;">
                                            {{-- Showroom open Monday to Friday<br>Saturday by appointment --}}
                                            Tent Wedding Showroom Visits
                                            <br>Click Here To Book An Appointment
                                        </span>
                                    </a>
                                </div>
                            </h3>
                        </div>
                        <div class="navbar-header">
                            <a href="{{action('Front\PageController@getIndex')}}" style="margin-left: 27px; margin:0 auto;" class="navbar-brand">
                                <img src="{{asset('default/front/imgs/75-year-gervaise.jpg')}}" alt="Logo" style="width: 200px">
                            </a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="text-align: center;">
                            <p style="background: #FF0000; color: #F3C651; font-size: 28px;">24hr Emergency Line</p>
                            <fieldset style="border: 1px solid #000; color: black; font-size: 20px;">
                                <h4>**This line is for emergencies only**</h4>
                                <p style="color: #000000">No pricing or product information can be obtained</p>
                                <p style="color: #000000">If you have a concern with a product that has been delivered or an order you wish in the next 24 hours</p>
                            </fieldset><br>
                            <a href="tel:416-678-1285" style="font-size: 20px;">416-678-1285</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End modal -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"> 
                                <a href="{{action('Front\PageController@getRentals')}}" class="dropdown-toggle disabled" data-toggle="dropdown">Product Rentals <b class="caret"></b></a>
                                <ul class="dropdown-menu big-menu">
                                <div class="row">
                                    @foreach($categories->sortBy('name')->chunk(10) as $category1)
                                        <div class="col-md-4">
                                        {{-- <div class="col-md-4" style="padding: 10px 38px"> --}}
                                            @foreach($category1 as $category) 
                                                <li><a style="display: block !important; line-height: 15px; padding:18px 20px !important;" href="{{route('category-products', [$category->route_name])}}">{{$category->name}}</a></li>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                </ul>
                            </li>
                            {{-- <li><a href="{{action('Front\PageController@getIndex')}}">Home</a></li> --}}
                            <li class="dropdown"> 
                                <a href="javascript::void(0)" class="dropdown-toggle disabled" data-toggle="dropdown">Tent Rentals <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @foreach(['tents-and-accessories.htm', 'tent-packages.htm', 'flooring.htm'] as $routeName)
                                        <li><a href="{{route('category-products', [$routeName])}}">{{ App\Admin\Category::where('route_name', $routeName)->first()->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> 
                                <a href="javascript::void(0)" class="dropdown-toggle disabled" data-toggle="dropdown">Event Rentals <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <!-- <div class="row">
                                        <div class="col-md-4" style="padding: 10px 38px"> -->
                                            <li><a href="{{action('Front\PageController@getweddingBackyardMicroRentals')}}">Backyard / Micro Weddings</a></li>
                                            <li><a href="{{action('Front\PageController@getBbqRentals')}}">BBQ Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getBridalShowRentals')}}">Bridal Show Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getCorporateEventRentals')}}">Corporate Event Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getCanadaDayRentals')}}">Canada Day Rentals</a></li>
                                        <!-- </div>
                                        <div class="col-md-4" style="padding: 10px 38px"> -->
                                            <li><a href="{{action('Front\PageController@getChristmasMarketRentals')}}">Christmas Market Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getChristmasPartyRentals')}}">Christmas Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getConvocationGraduationRentals')}}">Convocation Graduation Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getDecorRentals')}}">Decor Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getEasterRentals')}}">Easter Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getFallFestivalRentals')}}">Fall Festival Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@gethousePartyRentals')}}">House Party Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getMothersDayRentals')}}">Mother's Day Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getMusicFestivalRentals')}}">Music Festival Rentals</a></li>
                                        <!-- </div>
                                        <div class="col-md-4" style="padding: 10px 38px"> -->
                                            <li><a href="{{action('Front\PageController@getNewYearPartyRentals')}}">New Years Party Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getPartyRentals')}}">Party Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getPassoverRentals')}}">Passover Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getEventRentalsPickering')}}">Pickering Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getStPatricksDayRentals')}}">St. Patrick's Day Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getThanksgivingRentals')}}">ThanksGiving Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getTradeshowBoothRentals')}}">Tradeshow Booth Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getValentinesDayRentals')}}">Valentine's Day Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getWeddingChairRentals')}}">Wedding Chair Rentals</a></li>
                                            <li><a href="{{action('Front\PageController@getweddingRentals')}}">Wedding Rentals</a></li>
                                      <!--   </div>
                                    </div> -->
                                </ul>
                            </li>
                            <li class="dropdown"> 
                                <a href="{{action('Front\PageController@getAbout')}}" class="dropdown-toggle disabled" data-toggle="dropdown">About Gervais <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{action('Front\PageController@getMission')}}">MISSION</a></li>
                                    <li><a href="{{action('Front\PageController@getCaterers')}}">RECOGNIZED AFFILIATES</a></li>
                                    <!-- <li><a href="{{action('Front\PageController@getTestimonials')}}">TESTIMONIALS</a></li> -->
                                    <!-- <li><a href="{{action('Front\PageController@getReviews')}}">REVIEWS</a></li> -->
                                    <li><a href="{{action('Front\PageController@getAcknowledgements')}}">ACKNOWLEDGEMENTS</a></li>
                                    <li><a href="{{asset('imgs/Customer-Creed.pdf')}}">CUSTOMER CREED</a></li>
                                </ul>
                            </li>
                            <li><a href="{{action('Front\PageController@getTestimonials')}}">Testimonials</a></li>
                            <li><a href="{{action('Front\PageController@getReviews')}}">Reviews</a></li>
                            <li{{--  class="dropdown" --}}>
                                <a href="{{action('Front\PageController@getWhatsNew')}}"{{--  class="dropdown-toggle disabled" data-toggle="dropdown" --}}>What's New{{--  <b class="caret"> --}}</b></a>
                                
                                {{-- 18th June'19: Update by Kanav: CLient asked to remove the dropdown --}}
                                {{-- <ul class="dropdown-menu">
                                    <li><a href="https://gervaisrentals.com/imgs/Majestic-Coral-058.jpg" target="_blank">Majestic Coral</a></li>
                                    <li><a href="https://gervaisrentals.com/imgs/Majestic-Sage-059.jpg" target="_blank">Majestic Sage</a></li>
                                    <li><a href="https://gervaisrentals.com/imgs/Majestic-Turquoise-082.jpg" target="_blank">Majestic Turquoise</a></li>
                                    <li><a href="https://gervaisrentals.com/imgs/Majestic-Raspberry-090.jpg" target="_blank">Majestic Raspberry</a></li>
                                </ul> --}}
                            </li>
                            <li><a href="{{action('Front\PageController@getFaq')}}"> Faq’s</a></li>
                            <li><a href="{{action('Front\PageController@getClients')}}">Our Clients</a></li>
                            <li><a href="{{action('Front\PageController@getContactUs')}}">Contact Us</a></li>
                            <li><a href="{{action('Front\PageController@getEmployment')}}">Employment Opportunities</a></li>
                            <li><a href="{{action('Front\PageController@getGallery')}}">Visit Our Gallery</a></li>
                            <li><a href="{{action('Front\PageController@getOurCaterers')}}">Our Caterers</a></li>
                            <li><a href="{{action('Front\PageController@getOurVenues')}}">Our Venues</a></li>
                            <li><a href="{{action('Front\PageController@getOurEventPlanners')}}">Our Event Planners</a></li>
                            <li class="dropdown"> 
                                <a href="javascript::void(0)" class="dropdown-toggle disabled" data-toggle="dropdown">Delivery Locations<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{action('Front\PageController@getEventRentalsAjax')}}">Ajax</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsAurora')}}">Aurora</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsBelleville')}}">Belleville</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsBowmanville')}}">Bowmanville</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsCobourgPortHope')}}">Cobourg/Port Hope</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsClarington')}}">Clarington</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsHaliburton')}}">Haliburton</a></li>
                                    <li><a href="{{action('Front\PageController@getEventKawarthaLakesRentals')}}">Kawartha Lakes</a></li>
                                    <li><a href="{{action('Front\PageController@getEventLindsayRentals')}}">Lindsay</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsMarkham')}}">Markham</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsMuskoka')}}">Muskoka</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsNewmarket')}}">Newmarket</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsOshawa')}}">Oshawa</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsPeterborough')}}">Peterborough</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsPickering')}}">Pickering</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsPicton')}}">Picton</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsPrinceEdwardCounty')}}">Prince Edward County</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsRichmondHill')}}">Richmond Hill</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsScarborough')}}">Scarborough</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsToronto')}}">Toronto</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsUxbridge')}}">Uxbridge</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsVaughan')}}">Vaughan</a></li>
                                    <li><a href="{{action('Front\PageController@getEventRentalsWhitby')}}">Whitby Rentals</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="services-features text-center container" style="display: flex; justify-content:space-between">
        <div>
            <h3 style="font-size:20px;"><a href="{{ asset('imgs/Complete-Brochure-22112024.pdf') }}">Download our Brochure</a></h3>
        </div>

        <div class="col-lg-4 pull-right" style="margin-top: 16px; width:50%;">
            <div id="newtab-search-loader"></div>
            <div id="newtab-search-icon"></div>
            <div class="input-group search-box">
                @include('front/partials._search')
            </div>
            @include('front/partials._search_results')
        </div>
    </div>
</header>
@if(Session::has('noti'))
    <div class="alert alert-{{Session::get('noti')['type']}} fade in col-md-4 col-md-offset-4">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('noti')['msg'] }}</strong>
    </div>
@endif