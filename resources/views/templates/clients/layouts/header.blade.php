<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header">
        <!-- Topbar -->
        <div class="header_topbar dark">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-6 col-sm-6 col-4">
                        <span class="t-14 ">
                            {{$settings->name}} - ĐỊA CHỈ: {{ $settings->contact_address ?? ""}} - ĐIỆN THOẠI:
                            {{$settings->contact_phone ?? ""}}
                        </span>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-8">
                        <div class="topbar_menu">
                            <ul>
                                <li><a href="#"><i class="fab fa-youtube"></i>Youtube</a></li>
                                @if(get_user('customer'))
                                <li class="hide-m"><a href="{{ route('get.infouser', 'wishlist')}}"><i
                                            class="fas fa-heart"></i>Yêu thích</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Main header -->
        <div class="header_nav">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <a class="nav-brand" href="{{ route('home')}}">
                            <img src="{{ asset('img/logo.png')}}" class="logo" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-4 col-3">
                        <nav id="navigation" class="navigation navigation-landscape">
                            <div class="nav-header">
                                <div class="nav-toggle"></div>
                            </div>
                            <div class="nav-menus-wrapper" style="transition-property: none;">
                                <ul class="nav-menu">

                                    <li class=""><a href="{{ route('product.index')}}">Đặt hàng<span
                                                class="submenu-indicator"></span></a>
                                    </li>



{{--                                    <li><a href="{{ route('about')}}">Cửa hàng<span--}}
{{--                                                class="submenu-indicator"></span></a>--}}

{{--                                    </li>--}}


{{--                                    <li><a href="{{ route('get.all.promotion')}}">Khuyến mãi<span--}}
{{--                                                class="submenu-indicator"></span></a>--}}
{{--                                        <!-- <ul class="nav-dropdown nav-submenu">--}}
{{--                                            <li><a href="blog.html">...</a></li>--}}

{{--                                        </ul> -->--}}
{{--                                    </li>--}}

                                </ul>

                            </div>
                        </nav>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-5 col-5">
                        <div class="general_head_right">
                            <ul>
                                <!-- <li><a class="border-icon" data-toggle="collapse" href="#mySearch" role="button" aria-expanded="false" aria-controls="mySearch"><i class="fas fa-search"></i></a></li> -->
                                <li><a href="" class="dropdow-user border-icon ">
                                        @if(get_user('customer'))
                                        <i class="fas fa-user-circle mgr-10"></i>
                                        <h6 class="text-user text-overflow">
                                            {{ (get_user('customer','ten')) ? get_user('customer','ten') : 'Khách hàng' }}
                                        </h6>
                                        @else
                                        <i class="fas fa-user-circle"></i>
                                        <h6 class=" text-user text-overflow">Đăng nhập</h6>
                                        @endif
                                    </a>
                                    <div class="user-dropdown">
                                        <i class="fas fa-times dropexit"></i>
                                        <ul>
{{--                                            <li>--}}
{{--                                                <i class="fa fa-clock" aria-hidden="true"></i>--}}
{{--                                                <a href="{{ route('search.order')}}" class="ml-2">Tra cứu đơn hàng</a>--}}
{{--                                            </li>--}}
                                            @if( get_user('customer'))
                                            <li>
                                                <i class="fas fa-user"></i>
                                                <a class="ml-2" href=" {{ route('get.infouser', 'info')}}">Thông tin tài
                                                    khoản</a>
                                            </li>
                                            @if(!get_user('customer','type_social'))
                                            <li>
                                                <i class="fas fa-sync"></i>
                                                <a class="ml-2" href="{{ route('change.pass')}}">Đổi mật khẩu</a>
                                            </li>
                                            @endif
                                            <li>
                                                <i class="fas fa-sign-out-alt"></i>
                                                <a class="ml-2" href="{{ route('logout')}}">Đăng xuất</a>
                                            </li>
                                            @else

                                            <li>
                                                <i class="fas fa-user"></i>
                                                <a class="ml-2 " data-toggle="modal" data-target="#login">Đăng nhập</a>
                                            </li>

                                            @endif


                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    @if(Route::currentRouteName() !== "get.cart")
                                    <a class="border-icon" href="javascript:void(0);" onclick="openRightMenu()"><i
                                            class="fas fa-cart-plus"></i><span class="cart_counter">
                                            @if(Session::has('cart') != null)
                                            {{ count(Session::get('cart')) }}
                                            @else
                                            0
                                            @endif
                                        </span></a>

                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="collapse" id="mySearch">
                            <div class="blocks search_blocks">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm sản phẩm ?">
                                    <div class="input-group-append">
                                        <button class="btn search_btn" type="button"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="view-product">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
                <div class="modal-body">
                    <div class="row align-items-center">

                        <div class="login_signup ol-lg-12 col-md-12 col-sm-12">
                            <h3 class="login_sec_title">Đăng nhập</h3>

                            <div class="massage">
                                Tài khoản không chính xác
                            </div>
                            <form>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required class="form-control emailAcc">
                                </div>

                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" required class="form-control passwordAcc" name="password">
                                </div>

                                <div class="login_flex">
                                    <div class="login_flex_1">
                                        <a href="" id="forgetPassword" class="text-bold">Quên mật khẩu?</a>
                                    </div>
                                    <div class="login_flex_1">
                                        <a href="{{ route('register')}}" class="text-bold">Đăng kí</a>
                                    </div>
                                    <div class="login_flex_2">
                                        <div class="form-group mb-0">
                                            <button type="submit" id="loginAcc" class="btn btn-md btn-theme">Đăng
                                                nhập</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
{{--                            <div class="login_flex_2 mrg-20">--}}
{{--                                <div class="form-group mb-0 social facebook">--}}
{{--                                    <a href="{{ route('login.facebook','facebook')}}" type="submit" class="btn btn-md ">--}}
{{--                                        <i class="fab fa-facebook-square"></i>--}}
{{--                                        Facebook--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="form-group mb-0 social google">--}}
{{--                                    <a href="{{ route('login.facebook','google')}}" type="submit" class="btn btn-md ">--}}
{{--                                        <i class="fab fa-google-plus-square"></i>--}}
{{--                                        Google--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
