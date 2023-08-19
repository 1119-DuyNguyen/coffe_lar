@php use App\Http\Services\GateService;use Illuminate\Support\Facades\Gate; @endphp
<div class="main-sidebar sidebar-style-2">
    <div class="sidebar-brand">
        <a href="index.html">Admin Panel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">AD</a>
    </div>
    <ul class="sidebar-menu">
        {{--        [ name=>str, title=>str,child=>[]]--}}

        @foreach([
    ['name'=>'Dashboard','icon'=>'<i class="fas fa-chart-bar"></i>','routeName'=>'admin.dashboard.index' ,'title'=>'Dashboard','child'=>[]],
    ['name'=>'User','icon'=>'<i class="fas fa-user"></i>','child'=>
    [
        ['name'=>'User List','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.user.index'],
        ['name'=>'Create User','icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.user.create' ],
    ]],
        ['name'=>'Role','icon'=>'<i class="fas fa-passport"></i>','child'=>
    [
        ['name'=>'Role List','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.role.index'],
        ['name'=>'Create Role','icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.role.create' ],
    ]],
    ['title'=>'Ecommerce'],
    ['name'=>'Category','icon'=>'<i class="fas fa-border-all"></i>','child'=>
    [
        ['name'=>'Category','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.category.index'],
        ['name'=>'Sub Category','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.sub-category.index' ],
        ['name'=>'Child Category','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.child-category.index']
    ]],
    ['name'=>'Manage Products','icon'=>'<i class="fas fa-box"></i>','child'=>[
        ['name'=>'Brands','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.brand.index' ],
        ['name'=>'Products','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.product.index'  ],
        ['name'=>'Featured Products','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.featured-product.index'],
    ['name'=>'Coupons','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.coupon.index' ],
]],

    ['name'=>'Orders','icon'=>'<i class="fas fa-cart-plus"></i>','routeName'=>'admin.order.index' ,'child'=>[]],
    ['title'=>'Settings & More'],

   ['name'=>'Settings','icon'=>'<i class="fas fa-wrench"></i>','routeName'=>'admin.setting.index'  ],
    ['name'=>'Manage Website','icon'=>'<i class="fas fa-pager"></i>','child'=>[
                ['name'=>'Slider','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.slider.index' ],

                ['name'=>'About Page','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.about.index' ],
        ['name'=>'Terms Page','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.terms-and-conditions.index'  ],

]],

    ] as $nav
    )

            {{--            <li><a class="nav-link "--}}
            {{--                   href="{{ route('admin.subscribers.index') }}"><i class="fas fa-user"></i>--}}
            {{--                    <span>Subscribers</span></a></li>--}}
            @if(isset($nav['title']))
                <li class="menu-header">{{$nav['title']}}</li>
            @endif
            @if(isset($nav['name']))
                @if(empty($nav['child']))
                    @can(GateService::getGateDefineFromRouteName($nav['routeName']))
                        <li><a class="nav-link "
                               href="{{route($nav['routeName'])}}">
                                {!!  $nav['icon']!!}
                                <span>{{$nav['name']}}</span></a></li>
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

                                            <span>'.$child['icon'].$child['name'].'</span></a></li>';

                                }
                                }
                        @endphp
                        @canany($nameRouteList)
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                {!!  $nav['icon']!!}
                                <span>    {{$nav['name']}}</span></a>
                            <ul class="dropdown-menu">
                                {!! $html !!}
                                {{--                            @foreach($nav['child'] as $child)--}}
                                {{--                                @can(GateService::getGateDefineFromRouteName($child['routeName']))--}}

                                {{--                                    <li><a class="nav-link "--}}
                                {{--                                           href="{{route($child['routeName'])}}">--}}

                                {{--                                            <span>{{$child['icon']}}{{$child['name']}}</span></a></li>--}}
                                {{--                                @endcan--}}
                                {{--                            @endforeach--}}
                            </ul>
                        @endcan

                    </li>

                @endif
            @endif
        @endforeach



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

