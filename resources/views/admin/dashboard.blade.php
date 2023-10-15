@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Bảng điều khiển</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="{{ route('admin.order.index') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Doanh thu hôm nay</h4>
                            </div>
                            <div class="card-body">
                                {{ 0 }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="{{ route('admin.order.index') }}">
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
                <a href="{{ route('admin.product.index') }}">
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
        <div class="row">
            <div class="col-12" style="height: 50vh;">
                <canvas id="topProduct"></canvas>

            </div>
        </div>
    </section>



        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('topProduct');

                const data = {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                };

                new Chart(ctx, {
                    type: 'pie',
                    data: data

                });


            </script>
{{--            <script src="https://code.highcharts.com/highcharts.js">--}}
{{--            </script>--}}
{{--            <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--            <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
{{--            <script src="https://code.highcharts.com/modules/accessibility.js"></script>--}}
{{--            <script src="https://code.highcharts.com/modules/drilldown.js"></script>--}}
{{--            <script type="text/javascript">--}}
{{--                let value = document.querySelector('#container-topproduct').getAttribute('data-topproduct');--}}
{{--                value = JSON.parse(value);--}}
{{--                Highcharts.chart('container-topproduct', {--}}
{{--                    chart: {--}}
{{--                        type: 'pie',--}}
{{--                    },--}}
{{--                    title: {--}}
{{--                        text: 'TOP 5 SẢN PHẨM ĐƯỢC MUA NHỀU NHẤT',--}}
{{--                        style: {--}}
{{--                            fontSize: '20px'--}}
{{--                        }--}}
{{--                    },--}}
{{--                    tooltip: {--}}
{{--                        pointFormat: '{series.name}: <b>{point.y}</b>',--}}
{{--                    },--}}
{{--                    accessibility: {--}}
{{--                        point: {--}}
{{--                            valueSuffix: '%'--}}
{{--                        }--}}
{{--                    },--}}
{{--                    plotOptions: {--}}
{{--                        pie: {--}}
{{--                            allowPointSelect: true,--}}
{{--                            cursor: 'pointer',--}}
{{--                            dataLabels: {--}}
{{--                                enabled: true,--}}
{{--                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',--}}
{{--                                style: {--}}
{{--                                    fontSize: '14px',--}}
{{--                                }--}}
{{--                            },--}}
{{--                            showInLegend: true--}}
{{--                        }--}}
{{--                    },--}}
{{--                    series: [{--}}
{{--                        name: 'Số lượng',--}}
{{--                        colorByPoint: true,--}}
{{--                        data: value--}}
{{--                    }]--}}
{{--                });--}}

{{--                const formatCurrency = (x) => {--}}
{{--                    x = x.toLocaleString('it-IT', {--}}
{{--                        style: 'currency',--}}
{{--                        currency: 'VND'--}}
{{--                    });--}}
{{--                    return x;--}}
{{--                }--}}
{{--                // thong ke theo nam--}}
{{--                // var nowYear = new Date();--}}
{{--                // var getNowYear = nowYear.getFullYear();--}}
{{--                // let statisByYear = document.querySelector('#container-staticbyyear').getAttribute('data-staticbyyear');--}}
{{--                // statisByYear = JSON.parse(statisByYear);--}}
{{--                // let statisByDay = document.querySelector('#container-staticbyyear').getAttribute('data-staticbyday');--}}
{{--                // statisByDay = JSON.parse(statisByDay);--}}
{{--                // Highcharts.chart('container-staticbyyear', {--}}
{{--                //     chart: {--}}
{{--                //         type: 'column'--}}
{{--                //     },--}}
{{--                //     lang: {--}}
{{--                //         drillUpText: '◁ {series.name}\' e Geri Dön',--}}
{{--                //         decimalPoint: ',', // <== Most locales that use `.` for thousands use `,` for decimal, but adjust if that's not true in your locale--}}
{{--                //         thousandsSep: '.' // <== Uses `.` for thousands--}}
{{--                //     },--}}
{{--                //     title: {--}}
{{--                //         align: 'center',--}}
{{--                //         text: `DOANH THU NĂM ${getNowYear}`--}}
{{--                //     },--}}
{{--                //     accessibility: {--}}
{{--                //         announceNewData: {--}}
{{--                //             enabled: true--}}
{{--                //         }--}}
{{--                //     },--}}
{{--                //     xAxis: {--}}
{{--                //         type: 'category'--}}
{{--                //     },--}}
{{--                //     yAxis: {--}}
{{--                //         title: {--}}
{{--                //             text: ''--}}
{{--                //         }--}}
{{--                //--}}
{{--                //     },--}}
{{--                //     legend: {--}}
{{--                //         enabled: false,--}}
{{--                //     },--}}
{{--                //     plotOptions: {--}}
{{--                //         series: {--}}
{{--                //             borderWidth: 0,--}}
{{--                //             dataLabels: {--}}
{{--                //                 enabled: true,--}}
{{--                //                 format: `{point.y}`--}}
{{--                //             }--}}
{{--                //         }--}}
{{--                //     },--}}
{{--                //--}}
{{--                //     tooltip: {--}}
{{--                //         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',--}}
{{--                //         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>',--}}
{{--                //         valueSuffix: "đ",--}}
{{--                //     },--}}
{{--                //--}}
{{--                //     series: [{--}}
{{--                //         name: `Doanh thu năm ${getNowYear}`,--}}
{{--                //         colorByPoint: true,--}}
{{--                //         data: statisByYear,--}}
{{--                //     }],--}}
{{--                //     drilldown: {--}}
{{--                //         breadcrumbs: {--}}
{{--                //             position: {--}}
{{--                //                 align: 'right'--}}
{{--                //             }--}}
{{--                //         },--}}
{{--                //         series: statisByDay--}}
{{--                //     }--}}
{{--                // });--}}
{{--            </script>--}}
        @endpush
@endsection


{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>Dashboard</h1>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{ route('admin.order.index') }}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-primary">--}}
{{--                            <i class="fas fa-cart-plus"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Todays Orders</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $todaysOrder }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{ route('admin.order.index',['status'=>'pending']) }}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-primary">--}}
{{--                            <i class="fas fa-cart-plus"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Todays Peding Orders</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $todaysPendingOrder }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{ route('admin.order.index') }}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-primary">--}}
{{--                            <i class="fas fa-cart-plus"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Total Orders</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $totalOrders }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{ route('admin.order.index',['status'=>'pending']) }}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-primary">--}}
{{--                            <i class="fas fa-cart-plus"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Total Pending Orders</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $totalPendingOrders }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{ route('admin.order.index',['status'=>"canceled"]) }}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-danger">--}}
{{--                            <i class="fas fa-cart-plus"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Total Canceled Orders</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $totalCanceledOrders }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{ route('admin.order.index',['status'=>"delivered"]) }}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-danger">--}}
{{--                            <i class="fas fa-cart-plus"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Total Complete Orders</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $totalCompleteOrders }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}

{{--                <div class="card card-statistic-1">--}}
{{--                    <div class="card-icon bg-danger">--}}
{{--                        <i class="fas fa-money-bill-alt"></i>--}}
{{--                    </div>--}}
{{--                    <div class="card-wrap">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>Todays Earnings</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            {{$settings->currency_icon}}{{ $todaysEarnings }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}

{{--                <div class="card card-statistic-1">--}}
{{--                    <div class="card-icon bg-danger">--}}
{{--                        <i class="fas fa-money-bill-alt"></i>--}}
{{--                    </div>--}}
{{--                    <div class="card-wrap">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>This Month Earnings</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            {{$settings->currency_icon}}{{ $monthEarnings }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}

{{--                <div class="card card-statistic-1">--}}
{{--                    <div class="card-icon bg-info">--}}
{{--                        <i class="fas fa-money-bill-alt"></i>--}}
{{--                    </div>--}}
{{--                    <div class="card-wrap">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>This Years Earnings</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            {{$settings->currency_icon}}{{ $yearEarnings }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}


{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="{{route('admin.category.index')}}">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-info">--}}
{{--                            <i class="fas fa-list"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Total Categories</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $totalCategories }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}


{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <a href="#">--}}
{{--                    <div class="card card-statistic-1">--}}
{{--                        <div class="card-icon bg-warning">--}}
{{--                            <i class="far fa-file"></i>--}}
{{--                        </div>--}}
{{--                        <div class="card-wrap">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4>Total Users</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                {{$totalUsers}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </section>--}}
{{--@endsection--}}
