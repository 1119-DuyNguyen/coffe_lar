@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Bảng điều khiển</h1>
        </div>
        <div class="row">
            {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
            {{-- <a href="{{ route('admin.orders.index') }}">--}}
            {{-- <div class="card card-statistic-1">--}}
            {{-- <div class="card-icon bg-primary">--}}
            {{-- <i class="fas fa-cart-plus"></i>--}}
            {{-- </div>--}}
            {{-- <div class="card-wrap">--}}
            {{-- <div class="card-header">--}}
            {{-- <h4>Doanh thu hôm nay</h4>--}}
            {{-- </div>--}}
            {{-- <div class="card-body">--}}
            {{-- {{ 0 }}--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </a>--}}
            {{-- </div>--}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="{{ route('admin.orders.index') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Đơn hàng hôm nay</h4>
                            </div>
                            <div class="card-body">
                                {{ $countOrder }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="{{ route('admin.products.index') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Sản phẩm</h4>
                            </div>
                            <div class="card-body">
                                {{ $countProduct }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-12">--}}
        {{--                <div class="card">--}}
        {{--                    <div class="card-header">--}}
        {{--                        <h4>Thống kê lương nhân sự </h4>--}}

        {{--                    </div>--}}
        {{--                    <div class="card-body">--}}
        {{--                        @livewire('employee-salary-statistics-table')--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thống kê lợi nhuận bán hàng </h4>
                        {{--                        <div class="card-header-action">--}}
                        {{--                            <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i--}}
                        {{--                                    class="fas fa-plus"></i> Thêm mới</a>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="card-body">
                        @livewire(\App\Livewire\ProductRevenueStatisticsChart::class)
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thống kê số lượng sản phẩm đã xuất </h4>
                        {{--                        <div class="card-header-action">--}}
                        {{--                            <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i--}}
                        {{--                                    class="fas fa-plus"></i> Thêm mới</a>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="card-body">
                        @livewire(\App\Livewire\ProductQuantityStatisticsChart::class)
                    </div>

                </div>
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-12">--}}
        {{--                <div class="card">--}}
        {{--                    <div class="card-header">--}}
        {{--                        <h4>Thống kê doanh thu </h4>--}}
        {{--                        --}}{{--                        <div class="card-header-action">--}}
        {{--                        --}}{{--                            <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i--}}
        {{--                        --}}{{--                                    class="fas fa-plus"></i> Thêm mới</a>--}}
        {{--                        --}}{{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="card-body">--}}
        {{--                        @livewire('product-quantity-statistics-table')--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </section>

@endsection

