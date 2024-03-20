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
        <li><a class="nav-link " href="{{route('home')}}">
                <i class="fas fa-arrow-left"></i>
                <span>Quay lại trang chủ</span></a></li>
        {{-- [ name=>str, title=>str,child=>[]]--}}
        @php
            $listLanguage="Danh sách";

            $addLanguage="Khởi tạo";
        @endphp
        @foreach([
        ['name'=>'Statistic','icon'=>'<i class="fas fa-chart-bar"></i>','routeName'=>'admin.dashboard.index'
        ,'title'=>'Dashboard','child'=>[]],
        ['title'=>'Nhân sự'],
        ['name'=>'Tài khoản','icon'=>'<i class="fas fa-user"></i>','child'=>
        [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.users.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.users.create' ],
        ]],
        ['name'=>'Role','icon'=>'<i class="fas fa-passport"></i>','child'=>
        [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.roles.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.roles.create' ],
        ]],

               ['name'=>'Tính lương','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.products.index' ,
        'child'=>
        [
        ['name'=>'Loại ý kiến','routeName'=>'admin.type-opinions.index'],


        ['name'=>'Hợp đồng','routeName'=>'admin.contracts.index'],

        ['name'=>'Ý kiến','routeName'=>'admin.opinions.index'],

        /** receipt */


        ['name'=>'Chấm công','routeName'=>'admin.checkins.index'],




        ]
        ],
        ['title'=>'Thương mại'],
        ['name'=>'Category','icon'=>'<i class="fas fa-border-all"></i>','routeName'=>'admin.categories.index' ,'child'=>
        [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.categories.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.categories.create' ],
        ]],

        ['name'=>'Products','icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.products.index' ,
        'child'=>
        [
        ['name'=>$listLanguage,'icon'=>'<i class="fas fa-table"></i>','routeName'=>'admin.products.index'],
        ['name'=>$addLanguage,'icon'=>'<i class="fas fa-plus"></i>','routeName'=>'admin.products.create' ],

        ]

        ],
        ['name'=>'Kho','icon'=>'<i class="fas fa-table"></i>',
        'child'=>
        [

        ['name'=>'Nhập hàng','routeName'=>'admin.receipts.index'],
        ['name'=>'Đơn đặt hàng','routeName'=>'admin.orders.index' ],
        ['name'=>'Nhà cung cấp','routeName'=>'admin.providers.index'],
        ]

        ]

        ,



        ] as $nav
        )

            {{-- <li><a class="nav-link " --}} {{-- href="{{ route('admin.subscribers.index') }}"><i
                    class="fas fa-user"></i>--}}
            {{-- <span>Subscribers</span></a></li>--}}
            @if(isset($nav['title']))
                <li class="menu-header">{{__($nav['title'])}}</li>
            @endif
            @if(isset($nav['name']))
                @if(empty($nav['child']))

                    {{--                    @can(GateService::getGateDefineFromRouteName($nav['routeName']))--}}
                    <li><a class="nav-link " href="{{route($nav['routeName'])}}">
                            {!! $nav['icon']!!}
                            <span>{{__($nav['name'])}}</span></a></li>
                    {{--                    @endcan--}}

                @else
                    <li class="dropdown">

                        @php
                            $nameRouteList=[];
                            $html='';
                            foreach($nav['child'] as $child)
                            {
                            $nameRoute=GateService::getGateDefineFromRouteName($child['routeName']);
                            $nameRouteList[]=$nameRoute;

                            if(true||Gate::allows($nameRoute))
                            {
                            $html.='
                        <li><a class="nav-link " href="'.route($child['routeName']).'">

                                <span>'.($child['icon'] ?? "").__($child['name']).'</span></a></li>';

                        }
                        }

                        @endphp
                        {{--                        @canany($nameRouteList )--}}
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            {!! $nav['icon']!!}
                            <span> {{__($nav['name'])}}</span></a>
                        <ul class="dropdown-menu">
                            {!! $html !!}

                        </ul>
                        {{--                        @endcan--}}

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
