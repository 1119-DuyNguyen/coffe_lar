@php
use App\Http\Services\CartService;use App\Models\Category;use Illuminate\Support\Facades\Route;
$categories=Category::where('status',true)->get();

@endphp
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

                <div class="col-lg-9 col-md-6 col-6">
                    <span class="t-14 ">
                        {{-- {{$settings->name}}--}}
                        {{-- - ĐỊA CHỈ: {{ $settings->contact_address ?? ""}} - --}}
                        Liên hệ: {{$settings->contact_phone ?? ""}}
                    </span>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="topbar_menu">
                        <ul>
                            <li><a href="#" class="d-flex justify-content-end align-items-center"><i
                                        class="fab fa-youtube"></i>Youtube</a></li>

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
                        <img src="{{ asset('img/logo.png')}}" class="logo" alt="" />
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-3">

                    <nav id="navigation" class="navigation navigation-landscape">
                        <div class="nav-header">
                            <div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper" style="transition-property: none;">
                            <ul class="nav-menu">


                            </ul>

                        </div>
                    </nav>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-5 col-5">
                    <div class="general_head_right">
                        <ul>
                            <!-- category-->
                            @if(Auth::check())
                            <li><a href="" class="dropdown-user border-icon ">
                                    <i class="fas fa-user-circle"></i>

                                </a>
                                <div class="user-dropdown">
                                    <i class="fas fa-times dropexit d-lg-none"></i>
                                    <h4 class=" text-center text-bold">
                                        {{ Auth::user()->name?? 'Khách hàng' }}
                                    </h4>
                                    <ul>
                                        {{-- <li>--}}
                                            {{-- <i class="fa fa-clock" aria-hidden="true"></i>--}}
                                            {{-- <a href="{{ route('search.order')}}" class="ml-2">Tra cứu đơn
                                                hàng</a>--}}
                                            {{-- </li>--}}

                                        <li class="dropdown-item">
                                            {{-- <i--}} {{-- class="fas fa-chart-bar"></i>--}}
                                                <i class="fas fa-info-circle"></i>
                                                <a href="{{route('user.profile')}}">
                                                    Thông tin
                                                    người dùng</a>

                                        </li>
                                        @can('admin')

                                        <li class="dropdown-item">
                                            <i class="fas fa-chart-bar"></i>
                                            <a href="{{route('admin.dashboard.index')}}">
                                                Trang nhân viên</a>
                                        </li>
                                        @endcan
                                        <li class="dropdown-item">
                                            <i class="fas fa-file-invoice"></i>
                                            <a class="" href="{{route('user.order.index')}}">
                                                {{__("Order")}}</a>
                                        </li>

                                        {{-- <li class="dropdown-item">--}}
                                            {{-- <i class="fas fa-sync"></i>--}}
                                            {{-- <a class="" href="{{ route('user.profile')}}">--}}
                                                {{-- Đổi mật--}}
                                                {{-- khẩu</a>--}}
                                            {{-- </li>--}}
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf

                                            <li class="dropdown-item">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <a href="#" onclick="this.closest('form').submit();return false;"
                                                    class=""> Đăng xuất</a>

                                            </li>
                                        </form>


                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="border-icon" href="{{route('cart.index')}}"><i
                                        class="fas fa-cart-plus"></i><span class="cart_counter"
                                        id="header-cart-quantity">
                                        {{CartService::countCart()}}
                                    </span></a>
                                {{-- <a class="border-icon" href="javascript:void(0);" onclick="openRightMenu()">
                                    <i--}} {{-- class="fas fa-cart-plus"></i><span class="cart_counter" --}} {{--
                                            id="header-cart-quantity">--}}
                                            {{-- {{CartService::countCart()}}--}}
                                            {{-- </span>
                                </a>--}}

                            </li>
                            @else
                            <li><a href="" class="dropdown-user border-icon ">
                                    <i class="fas fa-user-circle"></i>
                                </a>

                                <div class="user-dropdown">
                                    <i class="fas fa-times dropexit d-lg-none"></i>
                                    <ul>
                                        {{-- <li>--}}
                                            {{-- <i class="fa fa-clock" aria-hidden="true"></i>--}}
                                            {{-- <a href="{{ route('search.order')}}" class="ml-2">Tra cứu đơn
                                                hàng</a>--}}
                                            {{-- </li>--}}


                                        <li class="dropdown-item" data-toggle="modal" data-target="#login">
                                            <i class=" fas fa-user"></i>
                                            <a class=" ">Đăng nhập</a>
                                        </li>
                                        {{-- <li class="dropdown-item" data-toggle="modal" --}} {{--
                                            data-target="#forgetPasswordForm">--}}
                                            {{-- <i class=" fas fa-key"></i>--}}
                                            {{-- <a href="#" class="">Quên mật khẩu ? </a>--}}
                                            {{-- </li>--}}

                                        <li class="dropdown-item" data-toggle="modal" data-target="#registerForm">
                                            <i class=" fas fa-file-alt"></i>
                                            <a href="#" class="">Đăng kí</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            @endif
                            @if(!Route::is('product.index'))
                            <li>
                                <a class="border-icon dropdown-user" href="javascript:void(0);">
                                    <i class="fas fa-list"></i>
                                </a>
                                <div class="user-dropdown">
                                    <i class="fas fa-times dropexit d-lg-none"></i>
                                    <h4 class=" text-center text-bold">
                                        Danh mục
                                    </h4>
                                    <ul>
                                        @foreach ($categories as $category)
                                        <li class="dropdown-item">
                                            <i class="{{$category->icon}}"></i>
                                            <a href="{{route('product.index', ['category' => $category->slug])}}">
                                                {{$category->name}} </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </li>

                            <li>
                                {{-- <a class="border-icon" href="javascript:void(0);" data-toggle="modal" --}} {{--
                                    data-target="#form-search" id="header-search">--}}
                                    {{-- <i class="fas fa-search"></i>--}}
                                    {{-- </a>--}}
                                <a class="border-icon" href="{{route('product.index')}}">
                                    <i class="fas fa-search"></i>
                                </a>

                            </li>
                            @endif


                        </ul>
                    </div>
                    <div class="collapse" id="mySearch">
                        <div class="blocks search_blocks">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm sản phẩm ?">
                                <div class="input-group-append">
                                    <button class="btn search_btn" type="button"><i class="fas fa-search"></i></button>
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
{{--<div class="modal fade" id="form-search" tabindex="-1" role="dialog" aria-labelledby="add-payment" --}} {{--
    aria-hidden="true">--}}
    {{-- <div class="modal-dialog modal-dialog-centered align-items-center d-flex justify-content-center h-100" --}}
        {{-- role="document">--}}
        {{-- <div class="modal-content h-75" id="view-product">--}}
            {{-- <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>--}}
            {{-- <span class="header-search">Tìm kiếm</span>--}}
            {{-- <div class="modal-body">--}}
                {{-- --}}{{-- @livewire('product-search')--}}
                {{--
                <livewire:product-search />--}}

                {{--
            </div>--}}
            {{-- </div>--}}
        {{-- </div>--}}
    {{--</div>--}}
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
                            <input type="text" name="email" class="form-control emailAcc">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control passwordAcc" name="password">
                        </div>

                        <div class="login_flex">
                            <div class="login_flex_2">
                                <div class="form-group mb-0">
                                    <button type="submit" id="loginAcc" class="btn btn-md btn-theme">Đăng nhập
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="login_flex_2 mrg-20">--}}
                            {{-- <div class="form-group mb-0 social facebook">--}}
                                {{-- <a href="{{ route('login.facebook','facebook')}}" type="submit"
                                    class="btn btn-md ">--}}
                                    {{-- <i class="fab fa-facebook-square"></i>--}}
                                    {{-- Facebook--}}
                                    {{-- </a>--}}
                                {{-- </div>--}}
                            {{-- <div class="form-group mb-0 social google">--}}
                                {{-- <a href="{{ route('login.facebook','google')}}" type="submit"
                                    class="btn btn-md ">--}}
                                    {{-- <i class="fab fa-google-plus-square"></i>--}}
                                    {{-- Google--}}
                                    {{-- </a>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
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

                            </div>
                            <div class="login_flex">
                                <div class="login_flex_1">
                                    <button type="submit" class="btn btn-md btn-theme">Xác nhận</button>
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
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Số điện thoại </label>
                                            <input type="text" name="phone" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Mật Khẩu</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Nhập Lại Mật Khẩu</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Tên</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 col-md-12">--}}
                                        {{-- <div class="form-group">--}}
                                            {{-- <label>Địa Chỉ</label>--}}
                                            {{-- <input type="text" name="address" class="form-control">--}}
                                            {{-- </div>--}}
                                        {{-- </div>--}}


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
                                // console.log(errors)
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
                        $('#login').modal('hide');
                        // $('#registerForm').modal('hide');

                        Swal.fire(
                            'Đăng nhập thành công',
                            '',
                            'success'
                        ).then((result) => {
                            window.location.reload();

                        })
                    }


                })

            });

        })


</script>

@endpush
