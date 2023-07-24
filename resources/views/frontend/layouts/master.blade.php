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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">
    <title>Sazao || e-Commerce HTML Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
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

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
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
@include('frontend.layouts.menu')
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


<!--==========================
  PRODUCT MODAL VIEW START
===========================-->
<section class="product_popup_modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="row">
                        <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                            <div class="wsus__quick_view_img">
                                <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                   href="https://youtu.be/7m16dFI1AF8">
                                    <i class="fas fa-play"></i>
                                </a>
                                <div class="row modal_slider">
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom1.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom2.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom3.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom4.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="wsus__pro_details_text">
                                <a class="title" href="#">Electronics Black Wrist Watch</a>
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                <h4>$50.00 <del>$60.00</del></h4>
                                <p class="review">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>20 review</span>
                                </p>
                                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                                <div class="wsus_pro_hot_deals">
                                    <h5>offer ending time : </h5>
                                    <div class="simply-countdown simply-countdown-one"></div>
                                </div>
                                <div class="wsus_pro_det_color">
                                    <h5>color :</h5>
                                    <ul>
                                        <li><a class="blue" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="orange" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="yellow" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="black" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="red" href="#"><i class="far fa-check"></i></a></li>
                                    </ul>
                                </div>
                                <div class="wsus_pro__det_size">
                                    <h5>size :</h5>
                                    <ul>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__quentity">
                                    <h5>quentity :</h5>
                                    <form class="select_number">
                                        <input class="number_area" type="text" min="1" max="100" value="1" />
                                    </form>
                                    <h3>$50.00</h3>
                                </div>
                                <div class="wsus__selectbox">
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-6">
                                            <h5 class="mb-2">select:</h5>
                                            <select class="select_2" name="state">
                                                <option>default select</option>
                                                <option>select 1</option>
                                                <option>select 2</option>
                                                <option>select 3</option>
                                                <option>select 4</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <h5 class="mb-2">select:</h5>
                                            <select class="select_2" name="state">
                                                <option>default select</option>
                                                <option>select 1</option>
                                                <option>select 2</option>
                                                <option>select 3</option>
                                                <option>select 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <ul class="wsus__button_area">
                                    <li><a class="add_cart" href="#">add to cart</a></li>
                                    <li><a class="buy_now" href="#">buy now</a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a></li>
                                </ul>
                                <p class="brand_model"><span>model :</span> 12345670</p>
                                <p class="brand_model"><span>brand :</span> The Northland</p>
                                <div class="wsus__pro_det_share">
                                    <h5>share :</h5>
                                    <ul class="d-flex">
                                        <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==========================
  PRODUCT MODAL VIEW END
===========================-->

@yield('content')


<!--============================
    FOOTER PART START
==============================-->

    @include('frontend.layouts.footer')
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
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
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

<!--main/custom js-->
<script src="{{asset('frontend/js/main.js')}}"></script>
@include('sweetalert::alert')

@stack('scripts')
</body>

</html>
