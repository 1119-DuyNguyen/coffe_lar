<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>

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
{{--                            {{$settings->name}} - ĐỊA CHỈ: {{ $settings->contact_address ?? ""}} - ĐIỆN THOẠI:--}}
                            {{--                            {{$settings->contact_phone ?? ""}}--}}
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

</div>
<div class="header header-sticky">

    <!-- Main header -->
    <div class="header_nav" style="padding: 0.75rem 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                    <a class="nav-brand" href="{{ route('home')}}">
                        <img src="{{ asset('img/logo.png')}}" class="logo" alt=""/>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-3">
                    {{--                        <nav id="navigation" class="navigation navigation-landscape">--}}
                    {{--                            <div class="nav-header">--}}
                    {{--                                <div class="nav-toggle"></div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="nav-menus-wrapper" style="transition-property: none;">--}}
                    {{--                                <ul class="nav-menu">--}}



                    {{--                                    --}}{{--                                    <li><a href="{{ route('about')}}">Cửa hàng<span--}}
                    {{--                                    --}}{{--                                                class="submenu-indicator"></span></a>--}}

                    {{--                                    --}}{{--                                    </li>--}}


                    {{--                                    --}}{{--                                    <li><a href="{{ route('get.all.promotion')}}">Khuyến mãi<span--}}
                    {{--                                    --}}{{--                                                class="submenu-indicator"></span></a>--}}
                    {{--                                    --}}{{--                                        <!-- <ul class="nav-dropdown nav-submenu">--}}
                    {{--                                    --}}{{--                                            <li><a href="blog.html">...</a></li>--}}

                    {{--                                    --}}{{--                                        </ul> -->--}}
                    {{--                                    --}}{{--                                    </li>--}}

                    {{--                                </ul>--}}

                    {{--                            </div>--}}
                    {{--                        </nav>--}}
                </div>

                <div class="col-lg-4 col-md-4 col-sm-5 col-5">
                    <div class="general_head_right">
                        <ul>
                            <li><a href="" class="dropdow-user border-icon ">
                                    @if(get_user('customer'))
                                        <i class="fas fa-user-circle mgr-10"></i>
                                        <h6 class="text-user text-overflow">
                                            {{ (get_user('customer','ten')) ? get_user('customer','ten') : 'Khách hàng' }}
                                        </h6>
                                    @else
                                        <i class="fas fa-user-circle"></i>
                                    @endif
                                </a>
                                <div class="user-dropdown">
                                    <i class="fas fa-times dropexit"></i>
                                    <ul>
                                        {{--                                            <li>--}}
                                        {{--                                                <i class="fa fa-clock" aria-hidden="true"></i>--}}
                                        {{--                                                <a href="{{ route('search.order')}}" class="ml-2">Tra cứu đơn hàng</a>--}}
                                        {{--                                            </li>--}}
                                        @if( \Illuminate\Support\Facades\Auth::check())
                                            <li>
                                                <i class="fas fa-user"></i>
                                                <a class="ml-2" href="{{ route('user.dashboard')}}">
                                                    Thông tin
                                                    tài
                                                    khoản</a>
                                            </li>
                                            @if(!get_user('customer','type_social'))
                                                <li>
                                                    <i class="fas fa-sync"></i>
                                                    <a class="ml-2" href="{{ route('user.profile')}}">
                                                        Đổi mật
                                                        khẩu</a>
                                                </li>
                                            @endif
                                            <li>
                                                <i class="fas fa-sign-out-alt"></i>
                                                <a class="ml-2" href="{{ route('logout')}}">
                                                    Đăng xuất</a>
                                            </li>
                                        @else

                                            <li data-toggle="modal" data-target="#login">
                                                <i class=" fas fa-user"></i>
                                                <a class=" ">Đăng nhập</a>
                                            </li>
                                            <li data-toggle="modal" data-target="#forgetPasswordForm">
                                                <i class=" fas fa-key"></i>
                                                <a href="#" class="">Quên mật khẩu ? </a>
                                            </li>

                                            <li data-toggle="modal" data-target="#registerForm">
                                                <i class=" fas fa-file-alt"></i>
                                                <a href="#" class="">Đăng kí</a>
                                            </li>
                                        @endif


                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="border-icon" href="javascript:void(0);" data-toggle="modal"
                                   data-target="#form-search" id="header-search">
                                    <i class="fas fa-search"></i>
                                </a>


                            </li>
                            <li>
                                @if(Route::currentRouteName() !== "get.cart")
                                    <a class="border-icon" href="javascript:void(0);" onclick="openRightMenu()"><i
                                            class="fas fa-cart-plus"></i><span class="cart_counter"
                                                                               id="header-cart-quantity">
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
<div class="modal fade" id="form-search" tabindex="-1" role="dialog" aria-labelledby="add-payment"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered align-items-center d-flex justify-content-center h-100"
         role="document">
        <div class="modal-content h-75" id="view-product">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
            <span class="header-search">Tìm kiếm</span>
            <div class="modal-body">
                {{--                @livewire('product-search')--}}
                <livewire:product-search/>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="view-product">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
            <div class="modal-body">
                <div class="row align-items-center">

                    <form method="POST" action=" {{ route('login')}}"
                          class="login_signup ol-lg-12 col-md-12 col-sm-12 form-account" method="post">
                        @csrf
                        <h3 class="login_sec_title">Đăng nhập</h3>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required class="form-control emailAcc">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" required class="form-control passwordAcc" name="password">
                        </div>

                        <div class="login_flex">
                            <div class="login_flex_2">
                                <div class="form-group mb-0">
                                    <button type="submit" id="loginAcc" class="btn btn-md btn-theme">Đăng nhập
                                    </button>
                                </div>
                            </div>
                        </div>

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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<div class="modal fade" id="forgetPasswordForm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
            <div class="modal-body">
                <div class="row align-items-center">

                    <div class="login_signup ol-lg-12 col-md-12 col-sm-12">
                        <h3 class="login_sec_title">Quên mật khẩu</h3>
                        <form action=" {{ route('password.request')}}" method="post" class="form-account">
                            @csrf
                            <div class="form-group">
                                <label>Nhập Email tài khoản của bạn :</label>
                                <input type="email" autocomplete="off" required class="form-control" name="emailforget">
                                @if($errors->first('emailforget'))
                                    <small class="text-danger">{{ $errors->first('emailforget') }}</small>
                                @endif
                            </div>
                            <div class="login_flex">
                                <div class="login_flex_1">
                                    <button type="submit" class="btn btn-md btn-theme">Xác nhận</b>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerForm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="login_signup">
                            <h3 class="login_sec_title">Tạo tài khoản</h3>
                            <form action=" {{route('register')}}" method="post" class="form-account">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        @if($errors->first('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Mật Khẩu</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        @if($errors->first('password'))
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Nhập Lại Mật Khẩu</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                        @if($errors->first('password_confirmation'))
                                            <small
                                                class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" name="hoten" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Địa Chỉ</label>
                                            <input type="text" name="diachi" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="login_flex">
                                            <div class="login_flex_2">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-md btn-theme">Đăng ký</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var forms = document.querySelectorAll(".form-account");
        console.log(forms)

        //init span error message
        forms.forEach(form => {
            let inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                let parent = input.parentElement;
                let span = document.createElement('div');
                span.innerHTML = `
                    <span class="text-danger error-text ${input.name}_error"
                    style="color: red"></span>`;

                parent.insertAdjacentHTML('afterend', span.outerHTML);
            })
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                var all = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: all,
                    beforeSend: function () {

                        $(document).find('span.error-text').text('');
                    },
                    statusCode: {
                        422: function (responseObject, textStatus, jqXHR) {
                            // validation error fails
                            if (responseObject.responseJSON) {
                                let errors = responseObject.responseJSON.errors;
                                console.log(errors)
                                if (errors) {
                                    for (const [prefix, value] of Object.entries(errors)) {
                                        let span = form.querySelector('span.' + prefix + '_error');
                                        span.innerText = value

                                        let input = form.querySelector('input[name=' + prefix + ']');
                                        input.focus();
                                    }

                                }
                            }

                        },
                        503: function (responseObject, textStatus, errorThrown) {
                            // Service Unavailable (503)
                            // This code will be executed if the server returns a 503 response
                        }
                    },
                    success: function (data) {

                        window.location.replace(
                            '{{Redirect::intended(route("home"))->getTargetUrl()}}'
                        );
                        // } else if (data == 2) {
                        //
                        //     $("#show_error").hide().html("Invalid login details");
                        // }

                    }


                })

            });

        })


    </script>

@endpush
