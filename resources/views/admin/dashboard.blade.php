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
        {{--            <h1 class="col-12">Thống kê doanh thu các tháng trong năm(đồng)</h1>--}}
        {{--            <div class="col-12">--}}
        {{--                <form action="{{route('admin.dashboard.index')}}" method="get">--}}
        {{--                    <label for="yearSelect">Chọn năm:</label>--}}
        {{--                    <select class="form-control" name="year" id="yearSelect" onchange="this.closest('form').submit();">--}}
        {{--                        --}}{{-- lấy 30 năm từ bây giờ--}}
        {{--                        @for($i=0;$i<10;++$i)--}}
        {{--                            @php $year=(int)date('Y') - $i; @endphp--}}
        {{--                            <option value="{{ $year  }}"--}}
        {{--                                    @if(!empty($selectedYear)&& $selectedYear==$year) selected @endif>{{ $year }}</option>--}}
        {{--                        @endfor--}}

        {{--                    </select>--}}

        {{--                </form>--}}

        {{--            </div>--}}
        {{--            <div class="col-12">--}}
        {{--                <canvas id="revenueChart" width="400" height="200"></canvas>--}}

        {{--            </div>--}}
        {{--        </div>--}}


        {{--    @push('scripts')--}}
        {{--    @once--}}
        {{--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}

        {{--    <script>--}}
        {{--        var ctx = document.getElementById('revenueChart').getContext('2d');--}}

        {{--                    function getMonthly(data) {--}}
        {{--                        var monthly = [];--}}

        {{--                        for (let i = 1; i <= 12; ++i) {--}}
        {{--                            let month = ('0' + i).slice(-2);--}}
        {{--                            let value = data.find(function (item) {--}}
        {{--                                return item.month == i; // Format as "YYYY-MM"--}}
        {{--                            });--}}
        {{--                            monthly[month+ "/{{$selectedYear}}"] = value ? (value.revenue ?? 0) : 0;--}}
        {{--                        }--}}
        {{--                        return monthly;--}}
        {{--                    }--}}

        {{--                    let monthly = getMonthly(@json($revenueData));--}}
        {{--                    var chart = new Chart(ctx, {--}}
        {{--                        type: 'line',--}}
        {{--                        data: {--}}
        {{--                            labels: Object.keys(monthly),--}}
        {{--                            datasets: [{--}}
        {{--                                label: 'Doanh thu',--}}
        {{--                                data: Object.values(monthly),--}}
        {{--                                backgroundColor: 'rgba(75, 192, 192, 0.2)',--}}
        {{--                                borderColor: 'rgba(75, 192, 192, 1)',--}}
        {{--                                borderWidth: 1,--}}
        {{--                            }],--}}
        {{--                        },--}}
        {{--                        options: {--}}
        {{--                            scales: {--}}
        {{--                                y: {--}}
        {{--                                    beginAtZero: true,--}}
        {{--                                },--}}
        {{--                            },--}}
        {{--                            plugins: {--}}
        {{--                                legend: {--}}
        {{--                                    onClick: function (e) {--}}
        {{--                                        e.stopPropagation();--}}
        {{--                                    }--}}
        {{--                                }--}}
        {{--                            }--}}
        {{--                        },--}}
        {{--                    })--}}



        {{--                    // ... Chart.js code as previously shown ...--}}
        {{--    </script>--}}
        {{--    @endonce--}}
        {{--    @endpush--}}

        {{-- <div class="row">--}}
        {{-- <div class="col-12" style="height: 50vh;">--}}
        {{-- <canvas id="topProduct"></canvas>--}}

        {{-- </div>--}}
        {{-- </div>--}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thống kê doanh thu </h4>
                        {{--                        <div class="card-header-action">--}}
                        {{--                            <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i--}}
                        {{--                                    class="fas fa-plus"></i> Thêm mới</a>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="card-body">
                        @livewire('product-quantity-statistics-table')
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

