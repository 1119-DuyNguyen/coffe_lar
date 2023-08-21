@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);

@endphp

@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
    <!--=============================
        DASHBOARD START
      ==============================-->
    <div class="container-fluid p-4">

        <div class="row">
            <div class="col-12">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i> Order Details</h3>
                    <div class="wsus__dashboard_profile">

                        <!--============================
                        INVOICE PAGE START
                    ==============================-->
                        <section id="" class="invoice-print">
                            <div class="">
                                <div class="wsus__invoice_area">
                                    <div class="wsus__invoice_header">
                                        <div class="wsus__invoice_content">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                    <div class="wsus__invoice_single">
                                                        <h5>Billing Information</h5>
                                                        <h6>{{ $address->name }}</h6>
                                                        <p>{{ $address->email }}</p>
                                                        <p>{{ $address->phone }}</p>
                                                        <p>{{ $address->address }}, {{ $address->city }},
                                                            {{ $address->state }}, {{ $address->zip }}</p>
                                                        <p>{{ $address->country }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                    {{--                                                    <div class="wsus__invoice_single text-md-center">--}}
                                                    {{--                                                        <h5>shipping information</h5>--}}
                                                    {{--                                                        <h6>{{ $address->name }}</h6>--}}
                                                    {{--                                                        <p>{{ $address->email }}</p>--}}
                                                    {{--                                                        <p>{{ $address->phone }}</p>--}}
                                                    {{--                                                        <p>{{ $address->address }}, {{ $address->city }},--}}
                                                    {{--                                                            {{ $address->state }}, {{ $address->zip }}</p>--}}
                                                    {{--                                                        <p>{{ $address->country }}</p>--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                                <div class="col-xl-4 col-md-4">
                                                    <div class="wsus__invoice_single text-md-end">
                                                        <h5>Order id: #{{ $order->id }}</h5>
                                                        <h6>Order status:
                                                            {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
                                                        </h6>
                                                        <p>Payment Method: {{ $order->payment_method }}</p>
                                                        {{--                                                        <p>Payment--}}
                                                        {{--                                                            Status: {{$order->payment_status === 1 ? 'Complete' : 'Pending'}}</p>--}}

                                                        {{--                                                        --}}{{--                                                            <p>Transaction id: {{ $order->transaction->transaction_id }}--}}
                                                        {{--                                                        </p>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wsus__invoice_description">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="name">
                                                            product
                                                        </th>

                                                        <th class="amount">
                                                            amount
                                                        </th>

                                                        <th class="">
                                                            quantity
                                                        </th>
                                                        <th class="total">
                                                            total
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($order->orderProducts as $orderProduct)
                                                        @php
                                                            $variants = json_decode($orderProduct->variants);
                                                        @endphp
                                                        <tr>
                                                            <td class="name">
                                                                <p>{{ $orderProduct->product_name }}</p>
                                                                @foreach ($variants as $key => $item)
                                                                    <span>{{ $key }} :
                                                                                {{ $item->name }}(
                                                                                {{ $settings->currency_icon }}{{ $item->price }}
                                                                                )</span>
                                                                @endforeach
                                                            </td>
                                                            <td class="amount">
                                                                {{ $settings->currency_icon }}
                                                                {{ $orderProduct->unit_price }}
                                                            </td>

                                                            <td class="">
                                                                {{ $orderProduct->qty }}
                                                            </td>
                                                            <td class="total">
                                                                {{ $settings->currency_icon }}
                                                                {{ $orderProduct->unit_price * $orderProduct->qty }}
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>


                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="wsus__invoice_footer">

                                        <p><span>Sub Total:</span>{{ $settings->currency_icon }} {{$order->sub_total}}
                                        </p>
                                        {{--                                        <p>--}}
                                        {{--                                            <span>Shipping Fee(+):</span>{{ $settings->currency_icon }} {{$shipping->cost ?? 0}}--}}
                                        {{--                                        </p>--}}
                                        <p>
                                            <span>Coupon(-):</span>
                                            @if($coupon->discount_type=='percent')
                                                {{$coupon->discount ??  0}}%

                                            @else
                                                {{ $settings->currency_icon }} {{$coupon->discount ??  0}}
                                            @endif
                                        </p>
                                        <p><span>Total Amount :</span>{{ $settings->currency_icon }} {{$order->amount}}
                                        </p>


                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--============================
                        INVOICE PAGE END
                    ==============================-->
                        <div class="col">
                            <div class="mt-2 float-end">
                                <button class="btn btn-warning print_invoice">print</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=============================
        DASHBOARD START
      ==============================-->
@endsection

@push('scripts')
    <script>
        $('.print_invoice').on('click', function () {
            let printBody = $('.invoice-print');
            let originalContents = $('body').html();

            $('body').html(printBody.html());

            window.print();

            $('body').html(originalContents);

        })
    </script>
@endpush
