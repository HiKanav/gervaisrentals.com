<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.partials._tag_manager_1')
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1 width=device-width">
    <meta name="title" content="@yield('meta-title')"/>
    <meta name="description" content="@yield('meta-description')"/>
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="google-site-verification" content="2hFxUizasUzDX5HwFFC9ksqaO_P6TMBGanT5zLhwf78" />
	<title>@yield('title')</title>
	<link href={{asset("default/assets/global/plugins/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" type="text/css" />
	{{--<link rel="stylesheet" href="{{asset('default/front/css/reset.css')}}">--}}
	<link href={{asset("default/assets/global/plugins/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.css">
    <!-- <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css"> -->
    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('default/front/css/dark.css')}}">
	<link rel="stylesheet" href="{{asset('default/front/css/style.css?v1')}}">
	@yield('css')
	<link rel="stylesheet" href="{{asset('libs/fancybox/source/jquery.fancybox.css?v=2.1.5')}}" type="text/css" media="screen" />
	<link rel="stylesheet" href="{{asset('libs/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}" type="text/css" media="screen" />
	<link rel="stylesheet" href="{{asset('libs/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7')}}" type="text/css" media="screen" />

	<link id="scrollUpTheme" rel="stylesheet" href="{{asset('libs/scrollup/demo/css/themes/tab.css')}}">
    <style>
       #mc_embed_signup{background:#f0f8ff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        @media (min-width: 991px){
            .big-menu {
                min-width: 1000px !important; 
            }
        }
        
        .main-banner img{
        	width: 100%;
    		height: 450px !important;
    		object-fit: cover;
        }
        .margnleft_margnright{
            margin-bottom: -65px; 
            margin-top: -55px;
        }
        #mc_embed_signup div.mce_inline_error{
            color: red !important;
            background-color: transparent !important;
        }
        @media (min-width:320px) and (max-width:991px) {
        .align_media {
            width: 310px !important;
        }
        .aign_media_sidebar{
            width: 101% !important;
        }
    }
    .nav.subscribe-list>li>a:focus, .nav.subscribe-list>li>a:hover { background-color: transparent !important;}
    span.helpline a {
        font-size: 18px !important;
        color: #FF0000 !important;
        font-weight: 300 !important;
    }
    .emergency{
        margin-top: 5px;
    }

     .block-cards .card-body h3 {
            font-size: 16px;
            font-weight: 200;
            text-transform: uppercase;
            text-align: center;
            line-height: 22px;
        }

        .block-cards.card {
            min-height: 100px;
            vertical-align: middle;
            border-radius: 0;
            padding: 2px;
            margin-bottom: 30px;
        }

        .rental-cards a {
            text-decoration: none;
            color: #ffffff;
        }

        .rental-cards .card-1 {
            background-color: #474aaa;
        }

        .rental-cards .card-2 {
            color: #3e5666;
            background-color: #a9d7d8;
        }

        .rental-cards .card-3 {
            background-color: #464646;
        }

        .rental-cards .card-4 {
            background-color: #3e5666;
        }
            
    </style>
</head>
<body>
    @include('front.partials._tag_manager_2')
	@include('front.partials._header')	
	@yield('content')
	@include('front.partials._footer')

    <!-- <div id="popup" class="modal fade" role="dialog">
      <div class="modal-dialog">

        Modal content
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Power outage</h4>
          </div>
          <div class="modal-body">
            <p>Dear valued visitors,</p>

            <p>We regret to inform you that are are currently experiencing a power outage, which is expected to continue until 4 PM today. We apologize for any inconvenience this may have caused.</p>

            <p>We appreciate your patience and understanding during this unforeseen situation.</p>

            <p>Thank you for your continued support.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div> -->

    <!-- changes for mail forwarded on 18/08/2023 -->
    <div id="popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content h4 text-danger">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Price Update</h4>
               </div>
               <div class="modal-body">
                   <p>Dear valued visitors,</p>

                   <p>Thank you for visiting our website, please note that we are in the process of updating our tent pricing for the 2024 season.</p>

                   <p> Please call our office at 416-288-1846 for the most up to date prices on our tents.</p>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>

        </div>
    </div>

	<script src="{{asset("default/assets/global/plugins/jquery.min.js")}}" type="text/javascript"></script>
	<script src={{asset("default/assets/global/plugins/bootstrap/js/bootstrap.min.js")}} type="text/javascript"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.js"></script>
	<script src={{asset("default/front/js/base.js")}} type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('libs/fancybox/source/jquery.fancybox.pack.js?v=2.1.5')}}"></script>
	<script type="text/javascript" src="{{asset('libs/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}"></script>
	<script type="text/javascript" src="{{asset('libs/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6')}}"></script>
	<script type="text/javascript" src="https://markgoodyear.com/labs/scrollup/js/jquery.scrollUp.min.js"></script>

    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'>
    </script>
    <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[7]='MMERGE7';ftypes[7]='text';fnames[8]='MMERGE8';ftypes[8]='text';fnames[9]='MMERGE9';ftypes[9]='text';fnames[10]='MMERGE10';ftypes[10]='text';fnames[11]='MMERGE11';ftypes[11]='text';fnames[12]='MMERGE12';ftypes[12]='text';fnames[13]='MMERGE13';ftypes[13]='text';fnames[14]='MMERGE14';ftypes[14]='text';fnames[15]='MMERGE15';ftypes[15]='text';fnames[16]='MMERGE16';ftypes[16]='text';fnames[17]='MMERGE17';ftypes[17]='text';fnames[18]='MMERGE18';ftypes[18]='text';fnames[19]='MMERGE19';ftypes[19]='text';fnames[20]='MMERGE20';ftypes[20]='text';fnames[21]='MMERGE21';ftypes[21]='text';fnames[22]='MMERGE22';ftypes[22]='text';fnames[23]='MMERGE23';ftypes[23]='text';fnames[24]='MMERGE24';ftypes[24]='text';fnames[25]='MMERGE25';ftypes[25]='text';fnames[26]='MMERGE26';ftypes[26]='text';fnames[27]='MMERGE27';ftypes[27]='text';fnames[28]='MMERGE28';ftypes[28]='text';fnames[29]='MMERGE29';ftypes[29]='text';fnames[30]='MMERGE30';ftypes[30]='text';}(jQuery));var $mcj = jQuery.noConflict(true);
    </script>
	<script type="text/javascript">
		(function ($) {
	        $.getQuery = function (query) {
	            query = query.replace(/[\[]/, '\\\[').replace(/[\]]/, '\\\]');
	            var expr = '[\\?&]' + query + '=([^&#]*)';
	            var regex = new RegExp(expr);
	            var results = regex.exec(window.location.href);
	            if (results !== null) {
	                return results[1];
	            } else {
	                return false;
	            }
	        };
	    })(jQuery);
		$(function(){
            $.scrollUp({
                animation: 'fade',
                activeOverlay: '#00FFFF',
                scrollImg: {
                    active: true,
                    type: 'background',
                    src: "{{asset('libs/scrollup/demo/img/top.png')}}"
                }
            });
            
            $('#scrollUpTheme').attr('href', "{{asset('libs/scrollup/demo/css/themes/image.css?1.1')}}");
            $('.image-switch').addClass('active');
            // Promotion popup
            // Removed popup and was asked to remove the pop on 23rd december
            // Note: If re-enabling popup for some propotion, don't forget to enable uncomment
            // inclusion of _promotion below

            // 1. original code for showing pop-up
            // 2. This code was commented 18 august to show new pop-u  
            // if(localStorage.getItem("busy-2018-new") === null){
            //     $('#popup').modal('show');
            //     localStorage.setItem("busy-2018-new", true);
            // }
            
            // pop up was added according to mail regarding limitation. 18 August 2023
            // if(localStorage.getItem("popup-230819-01") === null){
            //     $('#popup').modal('show');
            //     localStorage.setItem("popup-230819-01", true);
            // }

            // pop up was added according to mail regarding renovation. 08 january 2024
            // if(localStorage.getItem("popup-240108-01") === null){
            //     $('#popup').modal('show');
            //     localStorage.setItem("popup-240108-01", true);
            // }

            // pop up for tent rentals
            let path = window.location.pathname

            if (
                (
                    path == '/vaccination-tent-rentals'
                    ||
                    path == '/tents-and-accessories.htm'
                    ||
                    path == '/tent-packages.htm'
                    ||
                    path == '/flooring.htm'
                )
                &&
                localStorage.getItem("popup-240108-01") === null
            ) {
                $('#popup').modal('show');
                localStorage.setItem("popup-240108-01", true);
            }


            // Start - Search Products
                var $searchBoxInput = $('.search-box input[type="search"]'),
                    $searchLoader   = $("#newtab-search-loader"),
                    $instantResults = $('.instant-results'),
                    matchedProducts = [],
                    matchesCategories = [],
                    req             = null,
                    previousQuery   = null;

                $searchBoxInput.on('keyup', displaySearchResults);
                $searchBoxInput.on('focusin', function(e){ if(matchedProducts.length != 0 || matchesCategories != 0) $instantResults.show() ;  });
                
                $(document).on('click', hideResultsIfClickedOutside);
                
                // some browser not recognizing the click events,
                // so stop default behaviour of anchor and
                // open product page manually
                $('.container').on('click', '.result-entry', function(e){ e.preventDefault(); window.location.href = $(this).find('a').attr('href'); })
                
                function hideResultsIfClickedOutside(e){
                    if(!$(e.target).closest($instantResults).length && !$(e.target).closest($searchBoxInput).length){
                        if($instantResults.is(':visible')){ $instantResults.hide(); }
                    }
                }

                function displaySearchResults(e){
                    var query                = $.trim($(this).val()),
                        $resultBucket        = $('.result-bucket'),
                        $resultEntry         = $('.result-entry'),
                        $resultEntryOriginal = $('.result-entry-original'),
                        $scrollForMore       = $('.scroll-for-more');
                    
                    
                    if(previousQuery == query) return false;
                    
                    previousQuery = query;

                    $instantResults.hide();
                    $resultEntry.not($resultEntryOriginal).remove();

                    if(query.length < 2){
                        return false;
                    }

                    if(req != null) {
                        req.abort();
                        $searchLoader.hide();
                    }

                    $searchLoader.show();

                    req = $.get("{{ action('Front\PageController@getSearchProductsAsync') }}", {query: query}, function(response){
                        matchedProducts = response['products'];
                        matchesCategories = response['categories'];
                        var data = $.merge(matchesCategories, matchedProducts);
                        $searchLoader.hide();
                        if(data.length == 0) return false;
                        
                        data.forEach(function(product, i){
                            $resultEntry = $resultEntryOriginal.clone()
                                                .removeClass('result-entry-original')
                                                .attr({
                                                    'data-suggestion': 'Target ' + i+1,
                                                    'data-position': i+1
                                                }).show();
                            $resultEntry.find('img').attr('src', product.thumbnail_url);
                            $resultEntry.find('.media-heading').text(product.name);
                            if(product.route_name) {

                                $resultEntry.find('.result-link').attr({ href: 'https://gervaisrentals.com/'+product.route_name });
                            } else {
                                $resultEntry.find('.result-link').attr({ href: ("{{action('Front\PageController@getProductDetails', 'insert_id_here')}}").replace('insert_id_here', product.id)  });
                            }
                            $resultBucket.append($resultEntry);
                        });
                        
                        $scrollForMore.toggle(matchedProducts.length > 4);

                        $instantResults.show();
                    });
                }
            // End - Search Products
		})
	</script>

    
    {{-- @include('front.partials._analytic') --}}
    {{-- @include('front.partials._promotion') --}}
	@include('front.partials._facebook')
	{{-- @include('front.partials._remarketing') --}}
	@yield('js')
</body>
</html>