<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Admin Panel | Gervais Rentals</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
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
        <link href={{asset("default/assets/global/plugins/select2/css/select2.min.css")}} rel="stylesheet" type="text/css" />
        <link href={{asset("default/assets/global/plugins/select2/css/select2-bootstrap.min.css")}} rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href={{asset("default/assets/global/css/components.min.css")}} rel="stylesheet" id="style_components" type="text/css" />
        <link href={{asset("default/assets/global/css/plugins.min.css")}} rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href={{asset("default/assets/pages/css/login-4.min.css")}} rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <h3>Admin Panel</h3>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <img src="{{asset('imgs/logo-395.png')}}" class="img-responsive" alt="">
            <!-- BEGIN LOGIN FORM -->
            {!! Form::open(['action' => 'Auth\AuthController@postLogin', 'class' => 'login-form']) !!}
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        {!! Form::text('username', null, ['class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Username']) !!}
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        {!! Form::password('password', ['class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Password']) !!}
                        
                    </div>
                </div>
                <div class="form-actions">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1" /> Remember me </label>
                    <button type="submit" class="btn green pull-right"> Login </button>
                </div>
            {!!Form::close()!!}
            </form>
            <!-- END LOGIN FORM -->
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> {{date('Y')}} &copy; Gervais Rentals - All Rights Reserved </div>
        <!-- END COPYRIGHT -->
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
        <script src={{asset("default/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/jquery-validation/js/additional-methods.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/select2/js/select2.full.min.js")}} type="text/javascript"></script>
        <script src={{asset("default/assets/global/plugins/backstretch/jquery.backstretch.min.js")}} type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src={{asset("default/assets/global/scripts/app.min.js")}} type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src={{asset("default/assets/pages/scripts/login-4.js")}} type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>