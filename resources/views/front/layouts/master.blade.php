<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-231679409-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-231679409-1');
</script>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Zee School, Latur | @yield('title','zeeschoollatur.com')</title>
    <meta name="keywords" content="@yield('keywords','Mount Litera zee School Latur, zeeschool, latur, school, latur school')"/>
    <meta name="description" content="@yield('description','Mount Litera zee School Latur')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href=""/>

    <!-- CSS -->
    <link href="/assets/front/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/front/css/megamenu.css" rel="stylesheet">
    <link href="/assets/front/css/style.css" rel="stylesheet">
    <link href="/assets/front/css/font-awesome.css" rel="stylesheet">


    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" href="/assets/front/css/settings.css" media="screen">

    <!--[if IE 7]>
    <link rel="stylesheet" href="font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->

    <script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt=""
                 src="http://googleads.g.doubleclick.net/pagead/viewthroughconversion//?value=0&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <style>
        .megamenu > li a.drop-down {
            padding: 14px 20px 15px 0;
        }
    </style>



</head>

<body>
<header>
    <!-- BOF header -->
    <div class="container">
        <div class="row-fluid">
            <div class="span6" id="logo">
               <div class="span4"> <a href=""><img src="/assets/front/slider/DMES-Green-png.png"  width="110" height="110" title="Mount Litera zee School Latur"
                                alt="Mount Litera zee School Latur"></a>
               </div>

                <div class="span8 hidden-phone"> <br> <br>
                <h4 style="display:inline"> Mount Litera Zee School Latur</h4>
                </div>
                <br>


            </div>
            <div class="span6 pull-right" id="phone">
                <img src="/assets/front/slider/CBSE-Logo-2-png.png" style="float: left;  margin-top: 1px;width: 110px;" alt="British Council">

                <div class="hidden-phone" style="text-align:right;padding-top:30px;">
                    <b>Connect With Us :</b> <a href="https://www.facebook.com/Mount-Litera-Zee-School-Latur-Maharashtra-1543816125843148" target="_blank" class="fcb"><i
                                class="icon-facebook-sign icon-2x"></i></a>
                    <a href="https://www.youtube.com/channel/UCsmaMlGna2oE-BNKPu_zfYA/featured" target="_blank" class="yt pull-right"><i class="icon-youtube-sign icon-2x"></i></a><br>


                </div>
                <div id="phone" class="hidden-phone">
                    <b> <i class="icon-phone"></i>+91 9604960000 &nbsp;
                        <i class="icon-envelope"></i>info@zeeschoollatur.com
                    </b>
                </div>
            </div>
            <!-- End span8-->
        </div>
        <!-- End row-->
    </div>
    <!-- EOF header -->
</header>

@include('front.layouts.partials.nav')

<div class="container margin-bt10">
    <div class="row">

        <!-- Start left sidebar-->
        @if(isset($nolsidebar))

        @else
            @include('front.layouts.partials.lsidebar')
        @endif
        <!-- End left sidebar-->

        <!-- Start Page content-->
        <section class="span6">

            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>

                <?php $uri = Request::segment(1) ?>
                @if(isset($uri))
                    <li class="active"><span class="divider">/</span>{!! $uri!!}</li>
                @endif

            </ul>
            @yield('content')

        </section>
        <!-- End Page content-->


        @if(isset($norsidebar))
        @else
            <!-- Start right sidebar-->

            @include('front.layouts.partials.rsidebar')
            <!-- End right sidebar-->
        @endif

    </div>
</div>
<!-- end container-->

@include('front.layouts.partials.footer')


<!-- end footer-->
<div id="toTop" style="display: block;"><i class="icon-chevron-up icon-3x"></i></div>

@if(isset($display_admission_open))
    <div style="right:0px;position: fixed;top:135px;z-index: 10;">
        <a href="#http://www.zeeschoollatur.com/pages/admission-criteria/admission-criteria.html"><img
                    src="/assets/front/img/ZeeSchoolLatur-admissions15-16.png" alt=""></a>
    </div>
@endif
<!--<div id="long" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-width="700" data-replace="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h3 id="myModalLabel">Employees' Recruitment : 2015-16</h3>
</div>
<div style="max-height: 90vh; overflow-y: auto;" class="modal-body">
<img src="/assets/front/img/recruitment2015-16-popup.jpg"><br><br>
<p align="center"><a href="#http://www.zeeschoollatur.com//assets/front/img/recruitment2015-16.jpg">Click Here for more details</a></p>
</div>
</div>-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<!-- Support media queries for IE8 -->
<script type="text/javascript" src="/assets/front/js/respond.min.js"></script>

<!-- HTML5 and CSS3-in older browsers-->
<script type="text/javascript" src="/assets/front/js/modernizr.custom.17475.js"></script>

<!-- MEGAMENU -->
<script type="text/javascript" src="/assets/front/js/jquery.easing.js"></script>


<script type="text/javascript" src="/assets/front/js/megamenu.js"></script>

<!-- OTHER JS -->
<script type="text/javascript" src="/assets/front/js/bootstrap.js"></script>
<script type="text/javascript" src="/assets/front/js/functions.js"></script>

<!-- REVOLUTION SLIDER -->
<script type="text/javascript" src="/assets/front/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="/assets/front/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/front/js/revolutio-slider-func.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.carousel').carousel('cycle', {interval: 2000});
    });
</script>
<script>

    $(document).ready(function () {
        setTimeout(function () {
            var $modal = $('#long'); // your selector; cache it; only query the DOM once!
            $modal.modal('show'); // show modal; this happens after 3 seconds
        }, 3000);
    });

</script>
</body>
</html>
