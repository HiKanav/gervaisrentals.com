@extends('front.layout.rsb')

@section('title')Gervais Party & Tent Rentals @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('default/groovy/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Serif:400,700"     type="text/css" media="all">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700"     type="text/css" media="all">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500" type="text/css" media="all">
    <!-- //Fonts -->

@section('left-content')
    <ul class="breadcrumb">
        <li><a href="{{ action('Front\PageController@getIndex') }}">Home</a></li>
        @if($product->category)
            <li><a href="{{ $product->category_url }}">{{ $product->category->name }}</a></li>
        @endif
        <li class="active">{{ $product->name }}</li>
    </ul>
    <div class="products">
        <div class="single-page">
            <div class="single-page-row" id="detail-21">
                <div class="col-md-6">
                    <div class="flexslider">
                        <ul class="slides">
                            @for($i = 1; $i <= 3; $i++)
                                @if($product->{'thumbnail_location_'.$i} && File::exists(public_path().'/'.$productLocation.'/'.$product->{'thumbnail_location_'.$i}))
                                    <li data-thumb="{{asset($productLocation.'/'.$product->{'thumbnail_location_'.$i})}}">
                                        <div class="thumb-image zoom @if($i == 1)detail_images @endif"> <img src="{{ asset($productLocation.'/'.$product->{'thumbnail_location_'.$i} )}}" data-imagezoom="true" class="img-responsive" alt="{{ $product->name }}"></div>
                                    </li>
                                @endif
                            @endfor
                            {{-- <li data-thumb="{{ asset('default/groovy/images/s11.jpg') }}">
                                <div class="thumb-image detail_images"> <img src="{{ asset('default/groovy/images/s11.jpg') }}" data-imagezoom="true" class="img-responsive" alt="Groovy Apparel"></div>
                            </li>
                            <li data-thumb="{{ asset('default/groovy/images/s12.jpg') }}">
                                 <div class="thumb-image"> <img src="{{ asset('default/groovy/images/s12.jpg') }}" data-imagezoom="true" class="img-responsive" alt="Groovy Apparel"></div>
                            </li>
                            <li data-thumb="{{ asset('default/groovy/images/s13.jpg') }}">
                                <div class="thumb-image"> <img src="{{ asset('default/groovy/images/s13.jpg') }}" data-imagezoom="true" class="img-responsive" alt="Groovy Apparel"></div>
                            </li> --}} 
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 single-top-right">
                    <h1 class="item_name">{{ $product->name }}</h1>
                    <p>Please call us on <a href="tel:4162881846">416-288-1846</a> after you book your quote</p>
                    {{-- <div class="rating">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4" checked>
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                    </div> --}}
                    <div class="single-price">
                        <ul>
                            <li>{{'$'.number_format((float)$product->price, 2, '.', '')}} {{-- <small>10% Off</small> --}}</li>
                            {{-- <li><del>$75</del></li>
                            <li>Ends on: Nov,15th</li>
                            <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i>Apply Coupon</a></li> --}}
                        </ul>
                    </div>
                    <p class="single-price-text">{{ $product->description }}</p>
                    <div class="row">
                        {!! Form::open(['action' => 'Front\PageController@postRequestQuote']) !!}
                        <div class="col-md-4">
                            <div class="input-group">
                                <span id="sizing-addon1" class="input-group-addon"><i aria-hidden="true" class="fa fa-cart-plus"></i></span>
                                <input type="number" min="{{$product->min}}" max="{{$product->max}}" step="{{$product->step}}" aria-describedby="sizing-addon1" placeholder="#" class="form-control quantity" name="product_quantity[{{$product->id}}]" @if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) value="{{ Session::get('product_quantity')[$product->id] }}" @endif>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <span class="hidden-sm hidden-md hidden-lg"><br></span>
                            <button type="submit" class="btn btn-primary proceed">@if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) Update @else Add To Quote @endif</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
{{--                     <div class="row product">
                        <div class="col-sm-4 col-sm-offset-1">
                        </div>
                       
                        <span class="hidden-sm hidden-md hidden-lg"><br></span>
                        <div class="col-sm-5 text-left">
                            <button class="btn btn-primary proceed">@if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) Update @else Add @endif</button>
                        </div>
                    </div> --}}


                    {{-- <div class="cbp-pgcontent aitssinglew3" id="mens_single">
                        <button class="btn btn-danger agileits my-cart-btn" data-id="mens_single" data-name="{{ $product->name }}" data-summary="{{ $product->name }}" data-price="{{ $product->price }}" data-quantity="1" data-image="{{ asset('default/groovy/images/s11.jpg') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i> @if(Session::has('product_quantity') && in_array($product->id, array_keys(Session::get('product_quantity')))) Update @else Add To Quote @endif</button>
                        <div class="clearfix"></div>
                    </div> --}}

                    <div class="agilesocialwthree">
                        <h4>Share this Product</h4>
                        <ul class="social-icons">
                            <li><a target="_blank" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;" class="facebook w3ls" title="Go to Our Facebook Page"><i class="fa w3ls fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" href="http://twitter.com/share?text=I booked an awesome {{$product->name}} from " class="twitter w3l" title="Go to Our Twitter Account"><i class="fa w3l fa-twitter-square" aria-hidden="true"></i></a></li>
                            <li><a href="#" onclick="window.open('https://plus.google.com/share?url='+encodeURIComponent(location.href),'google-share-dialog','width=626,height=436');return false;" class="googleplus w3" title="Go to Our Google Plus Account"><i class="fa w3 fa-google-plus-square" aria-hidden="true"></i></a></li>
                            {{-- <li><a href="#" class="instagram wthree" title="Go to Our Instagram Account"><i class="fa wthree fa-instagram" aria-hidden="true"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('default/groovy/js/modernizr.custom.js') }}"></script>

    <!-- Custom-JavaScript-File-Links -->
        <!-- cart-js -->
        <script src="{{ asset('default/groovy/js/minicart.js') }}"></script>
        <script>
            w3l.render();

            w3l.cart.on('w3agile_checkout', function (evt) {
                var items, len, i;

                if (this.subtotal() > 0) {
                    items = this.items();

                    for (i = 0, len = items.length; i < len; i++) { 
                    }
                }
            });
        </script>  
        <!-- //cart-js -->

        <!-- Popup-Box-JavaScript -->
            {{-- <script src="{{ asset('default/groovy/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
            <script>
                $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });
                });
            </script> --}}
        <!-- //Popup-Box-JavaScript -->

        <!-- FlexSlider-JavaScript -->
            <script defer src="{{ asset('default/groovy/js/jquery.flexslider.js') }}"></script>
            <script src="{{ asset('default/front/js/zoom.js') }}"></script>
            <script>
                $(window).load(function() {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails",
                        start:function(slider){
                            $('.flex-direction-nav').css({visibility:'hidden'});
                        }

                    });
                    $('.zoom').zoom();

                    $('.proceed').on('click', function(){
                        console.log('here');
                        if($.trim($(this).closest('form').find('.quantity').val()) == '') return false;
                    });
                });
            </script>
        <!-- //FlexSlider-JavaScript -->

        <!-- ImageZoom-JavaScript -->{{-- <script src="{{ asset('default/groovy/js/imagezoom.js') }}"></script> --}}

    <!-- //Custom-JavaScript-File-Links -->
@stop