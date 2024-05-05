<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Zeeschool  | Admin Dashboard </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<link href="/assets/admin/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="/assets/admin/css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/assets/admin/css/print.css" rel="stylesheet" type="text/css" media="print"/>
	<link href="/assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
			<img src="/assets/admin/img/logo.jpg" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="/assets/admin/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			@if($adminAccess)
			@include('admin.layouts.partials.notification')
					<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->
			@include('admin.layouts.partials.todos')
					<!-- END TODO DROPDOWN -->
			@endif
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->

			<!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="{{-- $currentUser->avatar->url('avatar_small') --}}"/>
                <span class="username">

                     {{ $currentUser->name }}

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

	@include('admin.layouts.partials.sidebar2')


	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->

			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Dashboard <small>statistics and more</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Dashboard
							</a>
						</li>

					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								1349
							</div>
							<div class="desc">
								New Feedbacks
							</div>
						</div>
						<a class="more" href="#">
							View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-male"></i>
						</div>
						<div class="details">
							<div class="number">
								549
							</div>
							<div class="desc">
								New Students
							</div>
						</div>
						<a class="more" href="#">
							View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								+89%
							</div>
							<div class="desc">
								Brand Popularity
							</div>
						</div>
						<a class="more" href="#">
							View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								2,12,500
							</div>
							<div class="desc">
								Total Fees
							</div>
						</div>
						<a class="more" href="#">
							View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Site Visits
							</div>
							<div class="tools">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn default btn-sm active">
										<input type="radio" name="options" class="toggle" id="option1">Users </label>
									<label class="btn default btn-sm">
										<input type="radio" name="options" class="toggle" id="option2">Feedbacks </label>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="/assets/admin/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet solid light-grey bordered">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bullhorn"></i>Activities
							</div>
							<div class="tools">
								<div class="btn-group pull-right" data-toggle="buttons">
									<a href="" class="btn blue btn-sm active">
										Users
									</a>
									<a href="" class="btn blue btn-sm">
										Students
									</a>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="/assets/admin/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 100px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
					<!-- BEGIN PORTLET-->
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-signal"></i>Server Load
							</div>
							<div class="tools">
								<div class="btn-group pull-right" data-toggle="buttons">
									<a href="" class="btn red btn-sm active">
										Database
									</a>
									<a href="" class="btn red btn-sm">
										Web
									</a>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="load_statistics_loading">
								<img src="/assets/admin/img/loading.gif" alt="loading"/>
							</div>
							<div id="load_statistics_content" class="display-none">
								<div id="load_statistics" style="height: 108px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			<div class="clearfix">
			</div>


			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>General Stats
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-sm yellow easy-pie-chart-reload">
									<i class="fa fa-repeat"></i> Reload
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number transactions" data-percent="55">
											<span>
												 +55
											</span>
											%
										</div>
										<a class="title" href="#">
											Transactions <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number visits" data-percent="85">
											<span>
												 +85
											</span>
											%
										</div>
										<a class="title" href="#">
											New Visits <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
												 -46
											</span>
											%
										</div>
										<a class="title" href="#">
											Bounce <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Server Stats
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-4">
									<div class="sparkline-chart">
										<div class="number" id="sparkline_bar">
										</div>
										<a class="title" href="#">
											Network <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="sparkline-chart">
										<div class="number" id="sparkline_bar2">
										</div>
										<a class="title" href="#">
											CPU Load <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="sparkline-chart">
										<div class="number" id="sparkline_line">
										</div>
										<a class="title" href="#">
											Load Rate <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>
			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN REGIONAL STATS PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Regional Stats
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="region_statistics_loading">
								<img src="/assets/admin/img/loading.gif" alt="loading"/>
							</div>
							<div id="region_statistics_content" class="display-none">
								<div class="btn-toolbar margin-bottom-10">
									<div class="btn-group" data-toggle="buttons">
										<a href="" class="btn default btn-sm active">
											Users
										</a>
										<a href="" class="btn default btn-sm">
											Students
										</a>
									</div>
									<div class="btn-group pull-right">
										<a href="" class="btn default btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											Select Region
											<span class="fa fa-angle-down">
											</span>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:;" id="regional_stat_world">
													World
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_usa">
													USA
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_europe">
													Europe
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_russia">
													Russia
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_germany">
													Germany
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div id="vmap_world" class="vmaps display-none">
								</div>
								<div id="vmap_usa" class="vmaps display-none">
								</div>
								<div id="vmap_europe" class="vmaps display-none">
								</div>
								<div id="vmap_russia" class="vmaps display-none">
								</div>
								<div id="vmap_germany" class="vmaps display-none">
								</div>
							</div>
						</div>
					</div>
					<!-- END REGIONAL STATS PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Calendar
							</div>
						</div>
						<div class="portlet-body light-grey">
							<div id="calendar">
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			<div class="clearfix">
			</div>

		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		2014 &copy; zeeschool latur .
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/admin/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="/assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/admin/scripts/core/app.js" type="text/javascript"></script>
<script src="/assets/admin/scripts/custom/index.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {
		App.init(); // initlayout and core plugins
		Index.init();
		Index.initJQVMAP(); // init index page's custom scripts
		Index.initCalendar(); // init index page's custom scripts
		Index.initCharts(); // init index page's custom scripts
		Index.initChat();
		Index.initMiniCharts();
		Index.initDashboardDaterange();
		Index.initIntro();
		Tasks.initDashboardWidget();
	});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>