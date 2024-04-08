@php use App\Http\Services\GateService;use Illuminate\Support\Facades\Gate; @endphp
<div class="main-sidebar sidebar-style-2">
    {{--    <div class="sidebar-brand mt-3 ">--}}
    {{--        <a href="{{route('admin.dashboard.index')}}">--}}
    {{--            <img src="{{ asset('img/logo.png')}}" class="img-fluid h-100 img-thumbnail">--}}
    {{--        </a>--}}
    {{--    </div>--}}
    {{--    <div class="sidebar-brand sidebar-brand-sm">--}}
    {{--        <a href="{{route('admin.dashboard.index')}}">--}}
    {{--            <img src="{{ asset('img/logo.png')}}" class="img-fluid h-100 img-thumbnail">--}}
    {{--        </a>--}}


    {{--    </div>--}}
    <ul class="sidebar-menu">
        <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf

                <a class="nav-link " href="#" onclick="this.closest('form').submit();return false;"
                >
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Đăng xuất</span>
                </a>


            </form>
        </li>
        {{--        <li><a class="nav-link " href="{{route('home')}}">--}}
        {{--                <i class="fas fa-arrow-left"></i>--}}
        {{--                <span>Quay lại tra</span></a></li>--}}
        {{-- [ name=>str, title=>str,child=>[]]--}}
        @php
            $listLanguage="Danh sách";

            $addLanguage="Khởi tạo";
        @endphp
        @foreach([
        ['name'=>'Trang chủ','icon'=>'<i class="fas fa-chart-bar"></i>','routeName'=>'admin.dashboard.index'
        ,'title'=>'Dashboard','child'=>[]],

        ['title'=>'Nhân sự'],

        ['name'=>'Người dùng','icon'=>'<i class="fas fa-user"></i>','routeName'=>'admin.users.index'],
       ['name'=>'Nhân viên','icon'=>'<i class="fas fa-user-tie"></i>','routeName'=>'admin.employees.index'],
        ['name'=>'Role','icon'=>'<i class="fas fa-passport"></i>','routeName'=>'admin.roles.index'],
        ['name'=>'Loại ý kiến','icon'=>'<i class="fas fa-comment-dots"></i>','routeName'=>'admin.type-opinions.index'],


        ['name'=>'Hợp đồng','icon'=>'<i class="fas fa-file-contract"></i>','routeName'=>'admin.contracts.index'],

        ['name'=>'Ý kiến','icon'=>'<i class="fas fa-comments"></i>','routeName'=>'admin.opinions.index'],

        /** receipt */


        ['name'=>'Chấm công','icon'=>'<i class="fas fa-calculator"></i>','routeName'=>'admin.checkins.index'],

//               ['name'=>'Tính lương','icon'=>'<i class="fas fa-file-invoice-dollar"></i>','routeName'=>'admin.products.index' ,
//        'child'=>
//        [
//
//  ]
//        ],
        ['title'=>'Thương mại'],
        ['name'=>'Category','icon'=>'<i class="fas fa-border-all"></i>','routeName'=>'admin.categories.index' ],

        ['name'=>'Products','icon'=>'<i class="fas fa-coffee"></i>','routeName'=>'admin.products.index'

        ],

                ['name'=>'Nhập hàng','icon'=>'<i class="fas fa-file-import"></i>','routeName'=>'admin.receipts.index'],

        ['name'=>'Đơn đặt hàng','icon'=>'<i class="fas fa-file-alt"></i>','routeName'=>'admin.orders.index' ],

        ['name'=>'Nhà cung cấp','icon'=>'<i class="fas fa-shuttle-van"></i>','routeName'=>'admin.providers.index'],

//        ['name'=>'Thống kê','icon'=>'<i class="fas fa-scroll"></i>','routeName'=>'admin.receipts.index'],

//        ['name'=>'Kho','icon'=>'<i class="fas fa-table"></i>',
//        'child'=>
//        [
//
//
//        ]
//        ]






        ]
         as $nav
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
            console.log(navActive);
            navActive.forEach(nav => {

                var parent = nav.closest('li.dropdown');
                if (parent) {
                    if (nav.href == url) {
                        nav.parentElement.classList.add('active');
                    }
                    parent.classList.add('active');
                } else {
                    nav.closest('li').classList.add('active');

                }
            });
        }
        dynamicSidebar()
        // document.querySelector('[data-toggle="sidebar"]').addEventListener('click', (e)=>{
        //     dynamicSidebar();
        // });

    </script>
@endpush
