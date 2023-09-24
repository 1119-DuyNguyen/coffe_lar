<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@300;400;500;600;700&family=Mukta:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{!! asset('admin_asset/img/icons/icon-48x48.png') !!}" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    {{-- <link href="{!! asset('admin_asset/fontawesome-free-6.1.1-web/css/fontawesome.min.css') !!}" rel="stylesheet"> --}}
    <link href="{!! asset('admin_asset/bootstrap-5.1.3-dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_asset/css/app.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_asset/css/custom_css.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin_asset/toastr/toastr.min.css') !!}" rel="stylesheet">
    <link href="{{ asset('admin_asset/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js">
    </script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('showDashboard') }}">
                    <span class="align-middle">Admin Website</span>
                </a>
                <ul class="sidebar-nav" id="menuAdmin">
                    <li class="sidebar-item " value="dashboard">
                        <a class="sidebar-link " href="{{ route('showDashboard') }} ">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Sản phẩm
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('showMaterial') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Nguyên liệu</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('category.show') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Loại sản phẩm</span>
                        </a>
                    </li>


                    <li class="sidebar-item" value="product">
                        <a class="sidebar-link" href="{{ route('products.show') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Sản phẩm</span>
                        </a>
                    </li>

                    <li class="sidebar-item" value="coupon">
                        <a class="sidebar-link" href="{{ route('get.admin.coupon') }}">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                            <span class="align-middle">Khuyến Mãi</span>
                        </a>
                    </li>

                    <li class="sidebar-item" value="shipping">
                        <a class="sidebar-link" href="{{ route('get.shipping') }}">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <span class="align-middle">Vận Chuyển</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Tài khoản
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('show.customer') }}">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <span class="align-middle">Khách hàng</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('roles.show') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Phân quyền</span>
                        </a>
                    </li> -->
                    <li class="sidebar-header">
                        Tin tức
                    </li>
                    <li class="sidebar-item list_order">

                        <a class="sidebar-link" href="{{ route('get.typepost') }}">
                            <i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
                            <span class="align-middle">Loại tin tức</span>
                        </a>
                    </li>
                    <li class="sidebar-item list_order">

                        <a class="sidebar-link" href="{{ route('get.post') }}">
                            <i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
                            <span class="align-middle">Tin tức</span>
                        </a>
                    </li>
                    <li class="sidebar-item list_order">

                        <a class="sidebar-link" href="{{ route('get.policy') }}">
                            <i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
                            <span class="align-middle">Chính sách</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Đơn hàng
                    </li>
                    <li class="sidebar-item list_order">

                        <a class="sidebar-link" href="{{ route('get.order', 'all') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="align-middle">Tất cả <span
                                    class="count-order all">{{ $all ?? 0 }}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item list_order">
                        <a class="sidebar-link" href="{{ route('get.order', 'receive') }}">
                            <i class="fa fa-spinner" aria-hidden="true"></i>
                            <span class="align-middle">Tiếp nhận <span
                                    class="count-order receive">{{ $receive ?? 0 }}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order', 'process') }}">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            <span class="align-middle">Đang xử lí <span
                                    class="count-order process">{{ $process ?? 0 }}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order', 'success') }}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span class="align-middle">Hoàn thành<span
                                    class="count-order success">{{ $success ?? 0 }}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.order', 'cancel') }}">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            <span class="align-middle">Đã huỷ <span
                                    class="count-order cancel">{{ $cancel ?? 0 }}</span></span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Tin liên hệ
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.contact') }}">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span class="align-middle">Liên hệ</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Trang tĩnh
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.slide') }}">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                            <span class="align-middle">Slide</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.intro') }}">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                            <span class="align-middle">Giới thiệu</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.static') }}">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <span class="align-middle">Website</span>
                        </a>
                    </li>
                    <li class="sidebar-item" style="margin-bottom: 20px;">
                        <a class="sidebar-link" href="{{ route('get.banner') }}">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <span class="align-middle">Banner</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('quanlysudungnglieu') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Quản lý nguyên liệu sử dụng</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('get.all.comments') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Bình luận</span>
                        </a>
                    </li>


                </ul>
            </div>
        </nav>
        <div class="main">
            @include('templates.admins.nav-horizontal')
            <div class="product-admin main">
                @yield('content')
            </div>
        </div>
    </div>


    @yield('script')
    <script src="{!! asset('admin_asset/js/app.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/popper.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/fontawesome-free-6.1.1-web/js/fontawesome.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/bootstrap-5.1.3-dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/jquery-3.6.0.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/jqueryValidation.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/handle_web.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/custom_js.js') !!}"></script>

    <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> -->
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('contentEmail', {
        filebrowserBrowseUrl: "{{ asset('/ckfinder/ckfinder.html') }}",
        filebrowserUploadUrl: "{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{!! asset('admin_asset/toastr/toastr.min.js') !!}"></script>
    <link href="{!! asset('jsconfirm/jquery-confirm.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('jsconfirm/jquery-confirm.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/sweetalert2.all.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/bootstrap-datepicker.min.js') !!}"></script>
    <script src="{!! asset('admin_asset/js/custom_js.js') !!}"></script>
    <div class="modal_t">
        <div class="modal_overlay"></div>
        <div class="modal_body">
            <div class="modal_close">
                <i class="fa fa-times"></i>
            </div>
            <header class="modal_header">
                Chọn danh mục
            </header>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" /></th>
                        <th>STT</th>
                        <th>Tên</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <footer class="modal_footer">
                <a href="" id="listPromotion" class="btn primary">Lưu</a>
            </footer>
        </div>
    </div>
    <script>
    const close = document.querySelector('.modal_close');
    const modal = document.querySelector('.modal_t');
    const modalBody = document.querySelector('.modal_t .modal_body');
    close.addEventListener("click", () => {
        modal.classList.remove('showModal_t')
    })

    modal.addEventListener("click", () => {
        modal.classList.remove('showModal_t')
    })
    modalBody.addEventListener("click", (e) => {
        e.stopPropagation();
    })
    </script>


</body>

</html>