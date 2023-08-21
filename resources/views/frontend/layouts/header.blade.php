@php
    $categories = \App\Models\Category::where('status', 1)
    ->with(['subCategories' => function($query){
        $query->where('status', 1)
        ->with(['childCategories' => function($query){
            $query->where('status', 1);
        }]);
    }])
    ->get();
@endphp
<style>
    a i{
        padding: 0 2px;
    }

    .navbar-light .navbar-nav .dropdown-menu .nav-link.dropdown-toggle {
        /*color: #575757;*/
        color: #575757;

    }

    .navbar-light .navbar-nav .nav-link {
        color: #575757;
        text-transform: capitalize;
    }

    .navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show > .nav-link {
        /*color: rgba(255, 255, 255, .75);*/
        color: #08C;

    }


    .dropend .dropdown-toggle {
        /*color: salmon;*/
        color: #575757;
        margin-left: 1em;
    }


    .navbar-light .navbar-nav .dropdown-menu li:active > .nav-link.dropdown-toggle,
    .navbar-light .navbar-nav .dropdown-menu li:hover > .nav-link.dropdown-toggle,
    .navbar-light .navbar-nav li:hover > .dropdown-item {
        background-color: transparent;
        color: #08C;
    }


    .dropdown .dropdown-menu {
        display: none;
        padding-left: 0.125em;
    }

    .dropdown:hover > .dropdown-menu,
    .dropend:hover > .dropdown-menu {
        display: block;
        /*margin-top: 0.8em;*/
        /*margin-left: 0.125em;*/

    }

    @media screen and (max-width: 769px) {

        .dropdown:hover > .dropdown-menu,
        .dropend:hover > .dropdown-menu {
            border: none;

        }
    }

    @media screen and (min-width: 769px) {


        .dropend:hover > .dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%;
        }

        .dropend .dropdown-toggle {
            /*margin-left: 0.5em;*/
            padding-left: 0.125em;

        }
    }

</style>
<nav class="navbar navbar-expand-lg navbar-light sticky-top " style="background-color: #fff; ">
    <div class="container">
        <a class="navbar-brand fw-bold h-100" href="{{url('/')}}">
            <img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid p-3 rounded" style="width: 80px; ">
        </a>
        <button class="navbar-toggler shadow-none " style="border:none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ps-3 pe-3 pb-3 ps-lg-0 pe-lg-0 pb-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{url('/')}}"><i
                            class="fas fa-home"></i> home</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('featured-product.index')}}"><i
                            class="fas fa-star"></i> featured</a></li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="{{route('product.index')}}" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fas fa-box"></i> Product
                    </a>
                    @php
                        //                        $keyChildList=['subCategories','childCategories'];
                                                $keyChildList=[];

                    @endphp
                    <x-menu-recursive-category :categories="$categories" :keyChildList="$keyChildList">
                    </x-menu-recursive-category>
                </li>


            </ul>
            <div class="d-block justify-content-end d-lg-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item position-relative ms-md-2">

                        <a class="position-relative nav-link" href="{{route('user.wishlist.index')}}">
                            <i class="fas fa-heart"></i>
                            Wishlist
                            <span
                                class="position-absolute top-0 translate-middle p-2 bg-danger  rounded-circle"
                                style="
                                width: 25px;
                                height: 25px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                ">
                            <span id="wishlist_count" class="text-light">
                                @if (auth()->check())
                                    {{\App\Models\Wishlist::where('user_id', auth()->user()->id)->count()}}
                                @else
                                    0
                                @endif
                            </span>


  </span>
                        </a>

                        {{--    <span class="visually-hidden">unread messages</span>--}}

                    </li>
                    <li class="nav-item position-relative ms-md-2">

                        <a class="wsus__cart_icon position-relative nav-link" href="#">
                            <i class="fas fa-shopping-cart"></i>
                            Cart
                            <span
                                class="position-absolute top-0 translate-middle p-2 bg-danger  rounded-circle"
                                style="
                                width: 25px;
                                height: 25px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                ">
                            <span id="cart-count" class="text-light">{{count(\Cart::getContent())}}</span>


  </span>
                        </a>

                        {{--    <span class="visually-hidden">unread messages</span>--}}

                    </li>
                    @if (auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fas fa-user"></i> {{auth()->user()->username}}
                            </a>

                            <ul class="dropdown-menu">
                                <li class="dropdown-item">

                                        <a href="{{ route('user.profile') }}"><i
                                            <i class="fas fa-id-card"></i> Profile</a>

                                </li>
                                @can('user.dashboard.index')
                                    <li class="dropdown-item"><a href="{{route('user.dashboard')}}"><i
                                                class="fas fa-chart-bar"></i> Dashboard</a>

                                    </li>
                                @endcan
                                @can('user.order.index')
                                    <li class="dropdown-item"><a class="" href="{{route('user.order.index')}}"><i
                                                class="fas fa-file-invoice"></i>
                                            Orders</a></li>
                                @endcan

                                <li class="dropdown-item">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <a href="#" onclick="this.closest('form').submit();return false;"><i
                                                class="fas fa-sign-out-alt"></i> Logout</a>

                                    </form>
                                </li>
                            </li>
                            </ul>
                        {{--                            @if (auth()->user()->role === 'user')--}}
                        {{--                                <li><a href="{{route('user.dashboard')}}">my account</a></li>--}}
                        {{--                            @elseif (auth()->user()->role === 'admin')--}}

                    @else
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('login')}}"><i
                                    class="fas fa-sign-in-alt"></i> login </a></li>
                    @endif


                </ul>
                <form class="d-flex" action="{{route('product.index')}}" role="search">
                    <input class="form-control me-2 shadow-none" type="text" name='search' placeholder="Search" aria-label="Search">
                    <input type="submit" hidden/>
                    {{--                <button class="btn btn-outline-primary" type="submit">Search</button>--}}
                </form>

                <div class="wsus__mini_cart">
                    <h4>shopping cart <span class="wsus_close_mini_cart"><i class="fas fa-times"></i></span></h4>
                    <ul class="mini_cart_wrapper">
                        @foreach (\Cart::getContent() as $sidebarProduct)
                            <li id="mini_cart_{{$sidebarProduct->id}}">
                                <div class="wsus__cart_img">
                                    <a href="#"><img src="{{asset($sidebarProduct->attributes->image)}}" alt="product"
                                                     class="img-fluid w-100"></a>
                                    <a class="wsis__del_icon remove_sidebar_product" data-id="{{$sidebarProduct->id}}"
                                       href="#"><i class="fas fa-minus-circle"></i></a>
                                </div>
                                <div class="wsus__cart_text">
                                    <a class="wsus__cart_title"
                                       href="{{route('product.show', $sidebarProduct->attributes->slug)}}">{{$sidebarProduct->name}}</a>
                                    <p>
                                        {{$settings->currency_icon}}{{$sidebarProduct->price}}
                                    </p>
                                    <small>Variants
                                        total: {{$settings->currency_icon}}{{$sidebarProduct->attributes->variants_total}}</small>
                                    <br>
                                    <small>Qty: {{$sidebarProduct->quantity}}</small>
                                </div>
                            </li>
                        @endforeach
                        @if (count(\Cart::getContent()) === 0)
                            <li class="text-center">Cart is empty!</li>
                        @endif
                    </ul>
                    <div class="mini_cart_actions ">
                        <h5>sub total <span
                                id="mini_cart_subtotal">{{$settings->currency_icon}}{{getCartTotal()}}</span></h5>
                        <div class="wsus__minicart_btn_area">
                            <a class="common_btn" href="{{route('cart.index')}}">view cart</a>
                            <a class="common_btn" href="{{route('user.checkout')}}">checkout</a>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</nav>


{{--dynamic menu--}}
@push('scripts')
    <script>
        // for single sidebar menu
        var url = document.location.protocol + "//" + document.location.hostname + document.location.pathname;

        // multiple
        var navActive = Array.from(document.querySelectorAll('ul.navbar-nav a')).filter(function (a) {

            return url == a.href;
        });
        navActive.forEach(nav => {
            nav.classList.add('active');
            // var parent= nav.closest('li.dropdown');
            // if(parent)
            //     parent.classList.add('active');
        })

    </script>
@endpush
