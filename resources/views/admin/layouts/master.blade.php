<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Zeeschool Latur | @yield('title','zeeschoollatur.com')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="/assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/assets/admin/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    @yield('styles')

    <link rel="shortcut icon" href="../../../../public/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="/">
            <img src="/assets/admin/img/logo.jpg" alt="logo" class="img-responsive"/>
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="/assets/admin/img/menu-toggler.png" alt=""/>
        </a>
        <span style="color: white"> <h4>Mount Litera Zee School </h4></span>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->



            <?php // dd( $currentUser->name) ?>
                @if($adminAccess)
                    @include('admin.layouts.partials.notification')
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    @include('admin.layouts.partials.todos')
                    <!-- END TODO DROPDOWN -->
                @endif
                        <!-- BEGIN INBOX DROPDOWN -->

                <!-- END INBOX DROPDOWN -->

                <!-- BEGIN USER LOGIN DROPDOWN -->

                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" src="{{-- $currentUser->avatar->url('avatar_small') --}}"/>
                <span class="username">

                     {{--{{ $currentUser->name }}--}}

                    Admin

                </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/myadmin/users/{{ $currentUser->id }}">
                                <i class="fa fa-user"></i> My Profile
                            </a>
                        </li>

                        <li>
                            <a href="/logout">
                                <i class="fa fa-key"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->


        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->


    @if(isset($currentUser))
        @include('admin.layouts.partials.sidebar2')

    @endif
                <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">

            @yield('content')
        </div>
        <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        2014 &copy; Zendsoft.  {{-- // $news = Widget::run('recentNews') --}}


    </div>
    <div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/assets/admin/plugins/respond.min.js"></script>
<script src="/assets/admin/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/assets/admin/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script src="/assets/admin/scripts/core/app.js"></script>

@yield('scripts')
@if(!isset($initilize))
    <script>
        jQuery(document).ready(function () {
            App.init();
        });
    </script>
    @endif

            <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>