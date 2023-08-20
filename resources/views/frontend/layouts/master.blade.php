@php use Illuminate\Support\Facades\Request; @endphp
@if ($errors->any())
@foreach ($errors->all() as $error)
@php
    toast($error, "error")->autoClose('8000');
@endphp
@endforeach
@endif
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">
    <title>
        @yield('title',"e-commerce")
    </title>
    <link rel="icon" type="image/png" href="{{asset($logoSetting->favicon)}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/sweetalert/sweetalert.all.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset("backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("backend/assets/modules/datatables/datatables.min.css")}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($settings->layout=="RTL")
        <link rel="stylesheet" href="{{asset("frontend/css/rtl.css")}}">
    @endif
    <style >
        .dataTables_wrapper{
            overflow-x: auto;
        }
        table.table.dataTable
        {
            width: 100% !important;
        }
    </style>
    <!-- <link rel="stylesheet" href="{{asset('front/cssrtl.css')}}> -->
</head>

<body>

<!--============================
    HEADER START
==============================-->
@include('frontend.layouts.header')
<!--============================
    HEADER END
==============================-->


<!--============================
    MAIN MENU START
==============================-->
{{--@include('frontend.layouts.menu')--}}
<!--============================
    MAIN MENU END
==============================-->


<!--==========================
    POP UP START
===========================-->
<!-- <section id="wsus__pop_up">
    <div class="wsus__pop_up_center">
        <div class="wsus__pop_up_text">
            <span id="cross"><i class="fas fa-times"></i></span>
            <h5>get up to <span>75% off</span></h5>
            <h2>Sign up to E-SHOP</h2>
            <p>Subscribe to the <b>E-SHOP</b> market newsletter to receive updates on special offers.</p>
            <form>
                <input type="email" placeholder="Your Email" class="news_input">
                <button type="submit" class="common_btn">go</button>
                <div class="wsus__pop_up_check_box">
                </div>
            </form>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                <label class="form-check-label" for="flexCheckDefault11">
                    Don't show this popup again
                </label>
            </div>
        </div>
    </div>
</section> -->
<!--==========================
    POP UP END
===========================-->
<!--============================
<?php $link = ""; $countSegments=count(Request::segments());?>
@if($countSegments>0)
    BREADCRUMB START
==============================-->
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4> {{ucwords(str_replace('-',' ',Request::segment($countSegments)))}}</h4>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
{{--                        <li><a href="#">order tracking</a></li>--}}

                        @for($i = 1; $i <= $countSegments; $i++)
                            @if($i < $countSegments & $i > 0)
                                    <?php $link .= "/" . Request::segment($i); ?>

                                <li>
                                <a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a>
                                </li>

                            @else
                                <li>
                                    <a href="#" class="">
                                {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                                    </a>
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<div class="container" style="min-height: 100vh;">

@yield('content')
</div>

<!--============================
    FOOTER PART START
==============================-->

<footer style="  background: transparent;">
    <div class="wsus__footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="wsus__copyright d-flex justify-content-center">
                        <p>Copyright ©{{date('Y')}} Duy</p>
                    </div>
                </div>
                <div class="nav-item col-4">
                    <a class="nav-link  text-light" aria-current="page" href="{{route('about')}}"><i
                            class="fas fa-pager"></i> about</a>

                </div>
                <div class="nav-item col-4">
                    <a class="nav-link  text-light" aria-current="page" href="{{route('contact')}}"><i
                            class="fas fa-phone"></i> contact</a>

                </div>

            </div>
        </div>
    </div>
</footer>
{{--@include('frontend.layouts.footer')--}}
<!--============================
    FOOTER PART END
==============================-->


<!--============================
    SCROLL BUTTON START
==============================-->
<div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--============================
    SCROLL BUTTON  END
==============================-->


<!--jquery library js-->
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{asset("backend/assets/modules/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

<!--font-awesome js-->
{{--<script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>--}}
<!--select2 js-->
<script src="{{asset('frontend/js/select2.min.js')}}"></script>
<!--slick slider js-->
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!--simplyCountdown js-->
<script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
<!--product zoomer js-->
<script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
<!--nice-number js-->
<script src="{{asset('frontend/js/jquery.nice-number.min.js')}}"></script>
<!--counter js-->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
<!--add row js-->
<script src="{{asset('frontend/js/add_row_custon.js')}}"></script>
<!--multiple-image-video js-->
<script src="{{asset('frontend/js/multiple-image-video.js')}}"></script>
<!--sticky sidebar js-->
<script src="{{asset('frontend/js/sticky_sidebar.js')}}"></script>
<!--price ranger js-->
<script src="{{asset('frontend/js/ranger_jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/ranger_slider.js')}}"></script>
<!--isotope js-->
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<!--venobox js-->
<script src="{{asset('frontend/js/venobox.min.js')}}"></script>
<!--classycountdown js-->
<script src="{{asset('frontend/js/jquery.classycountdown.js')}}"></script>

<script src="{{asset('backend/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/datatables/Responsive-2.2.1/js/responsive.bootstrap4.js')}}"></script>
{{--<link rel="https://cdn.datatables.net/rowgroup/1.1.1/css/rowGroup.bootstrap4.min.css" />--}}
<script src="{{asset('lib/sweetalert/sweetalert.all.min.js')}}"></script>

<!--main/custom js-->
<script src="{{asset('frontend/js/main.js')}}"></script>
@include('frontend.layouts.scripts-app')
@include('sweetalert::alert')

@stack('scripts')
</body>

</html>
