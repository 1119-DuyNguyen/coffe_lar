@php use App\Http\Services\GateService;use Illuminate\Support\Facades\Gate; @endphp
<div class="main-sidebar sidebar-style-2">
    <div class="sidebar-brand mt-3">
        <a href="{{route('admin.dashboard.index')}}">
            <img src="{{ asset('img/logo.png')}}" class="img-fluid h-100 img-thumbnail">
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('admin.dashboard.index')}}">
            <img src="{{ asset('img/logo.png')}}" class="img-fluid h-100 img-thumbnail">
        </a>


    </div>
    <ul class="sidebar-menu">
        {{--        [ name=>str, title=>str,child=>[]]--}}
    @php
        $listLanguage="Danh sách";

        $addLanguage="Khởi tạo";
    @endphp
        @foreach([
        ['name'=>'Statistic','icon'=>'<i class="fas fa-chart-bar"></i>','routeName'=>'admin.dashboard.index' ,'title'=>'Dashboard','child'=>[]],
    ['name'=>'User','icon'=>'<i class="fas fa-user"></i>','child'=>
    [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.user.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.user.create' ],
    ]],
        ['name'=>'Role','icon'=>'<i class="fas fa-passport"></i>','child'=>
    [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.role.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.role.create' ],
    ]],
    ['title'=>'Thương mại'],
      ['name'=>'Category','icon'=>'<i class="fas fa-border-all"></i>','routeName'=>'admin.category.index'  ,'child'=>
    [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.category.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.category.create' ],
    ]],
//    ['name'=>'Category','icon'=>'<i class="fas fa-border-all"></i>','child'=>
//    [
//        ['name'=>'Category','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.category.index'],
//        ['name'=>'Sub Category','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.sub-category.index' ],
//        ['name'=>'Child Category','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.child-category.index']
//    ]],
       ['name'=>'Products','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.product.index' ,
        'child'=>
    [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.product.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.product.create' ],
    ]
        ],

//    ['name'=>'Manage Products','icon'=>'<i class="fas fa-box"></i>','child'=>[
//        ['name'=>'Brands','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.brand.index' ],
//        ['name'=>'Products','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.product.index'  ],
//        ['name'=>'Featured Products','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.featured-product.index'],
//    ['name'=>'Coupons','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.coupon.index' ],
//]],

    ['name'=>'Order','icon'=>'<i class="fas fa-cart-plus"></i>','routeName'=>'admin.order.index' ,'child'=>[]],

//    ['title'=>'Settings & More'],
//
//   ['name'=>'Settings','icon'=>'<i class="fas fa-wrench"></i>','routeName'=>'admin.setting.index'  ],
//    ['name'=>'Manage Website','icon'=>'<i class="fas fa-pager"></i>','child'=>[
//                ['name'=>'Slider','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.slider.index' ],
//
//
//]],

    ] as $nav
    )

            {{--            <li><a class="nav-link "--}}
            {{--                   href="{{ route('admin.subscribers.index') }}"><i class="fas fa-user"></i>--}}
            {{--                    <span>Subscribers</span></a></li>--}}
            @if(isset($nav['title']))
                <li class="menu-header">{{__($nav['title'])}}</li>
            @endif
            @if(isset($nav['name']))
                @if(empty($nav['child']))

                    @can(GateService::getGateDefineFromRouteName($nav['routeName']))
                        <li><a class="nav-link "
                               href="{{route($nav['routeName'])}}">
                                {!!  $nav['icon']!!}
                                <span>{{__($nav['name'])}}</span></a></li>
                    @endcan

                @else
                    <li
                        class="dropdown">

                        @php
                            $nameRouteList=[];
                            $html='';
                            foreach($nav['child'] as $child)
                                {
                            $nameRoute=GateService::getGateDefineFromRouteName($child['routeName']);
                            $nameRouteList[]=$nameRoute;

                            if(Gate::allows($nameRoute))
                                {
                            $html.='                                 <li><a class="nav-link "
                                           href="'.route($child['routeName']).'">

                                            <span>'.$child['icon'].__($child['name']).'</span></a></li>';

                                }
                                }

                        @endphp
                        @canany($nameRouteList)
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                {!!  $nav['icon']!!}
                                <span>    {{__($nav['name'])}}</span></a>
                            <ul class="dropdown-menu">
                                {!! $html !!}

                            </ul>
                        @endcan

                    </li>

                @endif
            @endif
        @endforeach
        <li><a class="nav-link "
               href="{{route('home')}}">
                <i class="fas fa-arrow-left"></i>
                <span>Quay lại</span></a></li>

    </ul>

    </aside>
</div>
{{--dynamic sidebar--}}
@push('scripts')
    <script>
        const dynamicSidebar = function () {

            // for single sidebar menu
            var url = document.location.protocol + "//" + document.location.hostname + document.location.pathname;

            // multiple
            var navActive = Array.from(document.querySelectorAll('ul.sidebar-menu a')).filter(function (a) {
                return url.includes(a.href);
            });
            navActive.forEach(nav => {
                if (nav.href == url) {
                    nav.parentElement.classList.add('active');
                }
                var parent = nav.closest('li.dropdown');
                if (parent)
                    parent.classList.add('active');
            });
        }
        dynamicSidebar()
        // document.querySelector('[data-toggle="sidebar"]').addEventListener('click', (e)=>{
        //     dynamicSidebar();
        // });

    </script>
@endpush

