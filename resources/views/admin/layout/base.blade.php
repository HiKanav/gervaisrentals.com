<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="@yield('meta-description')"/>
        <meta name="keywords" content="@yield('meta-keywords')">
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/global/plugins/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/global/plugins/simple-line-icons/simple-line-icons.min.css")}} rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/global/plugins/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/global/plugins/uniform/css/uniform.default.css")}} rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")}} rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @yield('page-level-css')
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href={{asset("default/assets/global/css/components.min.css")}} rel="stylesheet" id="style_components" type="text/css" />
        <link href={{asset("default/assets/global/css/plugins.min.css")}} rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href={{asset("default/assets/layouts/layout2/css/layout.min.css")}} rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/layouts/layout2/css/themes/blue.min.css")}} rel="stylesheet" type="text/css" id="style_color" />
        <link href={{asset("default/assets/layouts/layout2/css/custom.min.css")}} rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{action('Admin\CategoryController@index')}}"><img src="{{asset('imgs/logo.png')}}" alt="logo" class="logo-default small-thumbnail" /> </a>
                    <!-- <img src="http://gervaisrentals.com/images/logo_footer.png" alt="Gervais" class="small-thumbnail"> -->
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <div class="page-actions">
                    <a href="{{route('admin.quote.index')}}" type="button" class="btn btn-circle 
                    btn-outline blue dropdown-toggle">Quotes</a>
                </div>
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{Auth::user()->username}} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{action('Admin\UserController@getChangePassword')}}">
                                            <i class="icon-user"></i> Change Password </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{action('Auth\AuthController@getLogout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start">
                            <a href="{{action('Admin\CategoryController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-grid"></i>
                                <span class="title">Categories</span>
                                {{-- <span class="selected"></span>
                                <span class="arrow open"></span> --}}
                            </a>
                            {{-- <ul class="sub-menu">
                                <li class="nav-item start active open">
                                    <a href="index.html" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">View All</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="dashboard_2.html" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Add New</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\ProductController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-handbag"></i>
                                <span class="title">Products</span>
                                <span class="arrow"></span>
                            </a>
                            {{-- <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">View All</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">Add New</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\GalleryController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-picture"></i>
                                <span class="title">Gallery</span>
                                <span class="arrow"></span>
                            </a>
                            {{-- <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">View All</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">Add New</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\TestimonialController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-like"></i>
                                <span class="title">Testimonials</span>
                                <span class="arrow"></span>
                            </a>
                            {{-- <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">View All</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">Add New</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\ClientController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Clients</span>
                                <span class="arrow"></span>
                            </a>
                            {{-- <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">View All</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">Add New</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\FaqController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">FAQs</span>
                                <span class="arrow"></span>
                            </a>
                            {{-- <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">View All</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">Add New</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\ExtraChargeController@getIndex')}}" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Extra Charges</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Admin\QuoteController@index')}}" class="nav-link nav-toggle">
                                <i class="icon-basket-loaded"></i>
                                <span class="title">Quotes</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> @yield('page-title')
                        <small>@yield('page-description')</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <span>Home</span>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            @yield('breadcrumbs')
                        </ul>
                    </div>
                    {{--var_dump(Session::get('noti'))--}}
                    <!-- END PAGE HEADER-->
                    @if(Session::has('noti'))
                        <div class="alert alert-{{Session::get('noti')['type']}} fade in col-md-4 col-md-offset-4">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>{{ Session::get('noti')['msg'] }}</strong>
                      </div>
                    @endif
                    @yield('page-content')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> {{date('Y')}} &copy; Gervais Rentals.
                <a href="http://gervaisrentals.com" title="Gervais Rentals" target="_blank">Gervais Rentals</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
        <script src={{asset("default/assets/global/plugins/respond.min.js")}}></script>
        <script src={{asset("default/assets/global/plugins/excanvas.min.js")}}></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src={{asset("default/assets/global/plugins/jquery.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/bootstrap/js/bootstrap.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/js.cookie.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/jquery.blockui.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/uniform/jquery.uniform.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}} type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @yield('page-level-js-plugins')
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src={{asset("default/assets/global/scripts/app.min.js")}} type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @yield('page-level-js')
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src={{asset("default/assets/layouts/layout2/scripts/layout.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/layouts/layout2/scripts/demo.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/layouts/global/scripts/quick-sidebar.min.js")}} type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>