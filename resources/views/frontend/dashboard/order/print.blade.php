@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);

@endphp
<!DOCTYPE html>
<html>
<head>
    <title>{{$settings->site_name}}</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 1rem;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:200px;
        height:60px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:1.25rem;
    }
    table tr td{
        font-size:1rem;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height: 1rem;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:1rem;
        line-height:1rem;
    }
    .total-right p{
        padding-right:20px;
    }
    th{
        text-transform: capitalize;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Order Id : <span>#{{ $order->id }}</span></p>
{{--        <p class="m-0 pt-5 text-bold w-100">Order Id - <span>AB123456A</span></p>--}}
        <p class="m-0 pt-5 text-bold w-100">Order Date : <span>{{date('D, d M Y H:i:s',strtotime($order->created_at))}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order status:
            {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
        </p>
        <p class="m-0 pt-5 text-bold w-100">Payment Method: {{ $order->payment_method }}</p>
        <p class="m-0 pt-5 text-bold w-100"><span>Sub Total:</span>{{ $settings->currency_icon }} {{$order->sub_total}}
        </p>
        {{--                                        <p class"m-0 pt-5 text-bold w-100">--}}
        {{--                                            <span>Shipping Fee(+):</span>{{ $settings->currency_icon }} {{$shipping->cost ?? 0}}--}}
        {{--                                        </p>--}}
        <p class="m-0 pt-5 text-bold w-100">
            <span>Coupon(-):</span>
            @if($coupon->discount_type=='percent')
                {{$coupon->discount ??  0}}%

            @else
                {{ $settings->currency_icon }} {{$coupon->discount ??  0}}
            @endif
        </p>
        <p class="m-0 pt-5 text-bold w-100"><span>Total Amount :</span>{{ $settings->currency_icon }} {{$order->amount}}
        </p>
    </div>
    <div class="w-50 float-left logo mt-10">
        <img src="{{''}}" alt="Logo">
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <h5>Billing Information</h5>
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Mountain View,</p>
                    <p>California,</p>
                    <p>United States</p>
                    <p>Contact: (650) 253-0000</p>

                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{ $address->name }}</p>
                    <p>{{ $address->email }}</p>
                    <p>{{ $address->phone }}</p>
                    <p>{{ $address->address }}, {{ $address->city }},
                        {{ $address->state }}, {{ $address->zip }}</p>
                    <p>{{ $address->country }}</p>
{{--                    <p> 410 Terry Ave N,</p>--}}
{{--                    <p>Seattle WA 98109,</p>--}}
{{--                    <p>United States</p>--}}
{{--                    <p>Contact: 1-206-266-1000</p>--}}
                </div>
            </td>
        </tr>
    </table>
</div>
{{--<div class="table-section bill-tbl w-100 mt-10">--}}
{{--    <table class="table w-100 mt-10">--}}
{{--        <tr>--}}
{{--            <th class="w-50">Payment Method</th>--}}
{{--            <th class="w-50">Shipping Method</th>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>Cash On Delivery</td>--}}
{{--            <td>Free Shipping - Free Shipping</td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</div>--}}
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
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
{{--            <th class="w-50">SKU</th>--}}
{{--            <th class="w-50">Product Name</th>--}}
{{--            <th class="w-50">Price</th>--}}
{{--            <th class="w-50">Qty</th>--}}
{{--            <th class="w-50">Subtotal</th>--}}
{{--            <th class="w-50">Tax Amount</th>--}}
{{--            <th class="w-50">Grand Total</th>--}}
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
                    @empty($variants)
                        <span></span>
                    @else
                    @foreach ($variants as $key => $item)
                        <span>{{ $key }} :
                                                                                {{ $item->name }}(
                                                                                {{ $settings->currency_icon }}{{ $item->price }}
                                                                                )</span>
                    @endforeach
                    @endif
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
{{--        <tr align="center">--}}
{{--            <td>M101</td>--}}
{{--            <td>Andoid Smart Phone</td>--}}
{{--            <td>$500.2</td>--}}
{{--            <td>3</td>--}}
{{--            <td>$1500</td>--}}
{{--            <td>$50</td>--}}
{{--            <td>$1550.20</td>--}}
{{--        </tr>--}}
{{--        <tr align="center">--}}
{{--            <td>M102</td>--}}
{{--            <td>Andoid Smart Phone</td>--}}
{{--            <td>$250</td>--}}
{{--            <td>2</td>--}}
{{--            <td>$500</td>--}}
{{--            <td>$50</td>--}}
{{--            <td>$550.00</td>--}}
{{--        </tr>--}}
{{--        <tr align="center">--}}
{{--            <td>T1010</td>--}}
{{--            <td>Andoid Smart Phone</td>--}}
{{--            <td>$1000</td>--}}
{{--            <td>5</td>--}}
{{--            <td>$5000</td>--}}
{{--            <td>$500</td>--}}
{{--            <td>$5500.00</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="7">--}}
{{--                <div class="total-part">--}}
{{--                    <div class="total-left w-85 float-left" align="right">--}}
{{--                        <p>Sub Total</p>--}}
{{--                        <p>Tax (18%)</p>--}}
{{--                        <p>Total Payable</p>--}}
{{--                    </div>--}}
{{--                    <div class="total-right w-15 float-left text-bold" align="right">--}}
{{--                        <p>$7600</p>--}}
{{--                        <p>$400</p>--}}
{{--                        <p>$8000.00</p>--}}
{{--                    </div>--}}
{{--                    <div style="clear: both;"></div>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
    </table>
</div>
</body>
</html>
