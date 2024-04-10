@php
    $orderProduct=$order->orderProducts;
@endphp


    <!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$settings->site_name}}</title>
    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }


        table {
            width: 100%;
            border-spacing: 0;
        }

        table.products {
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        table.products tr {
            background-color: #ffa426;
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;

        }

        table tr.items:nth-child(odd) {
            background-color: #ffffff;
        }

        table tr.items:nth-child(even) {
            background-color: #fff1e8;
        }

        table tr.items td {
            padding: 0.5rem;

        }

        table.products tr, table.products td {
            /*border:1px solid #C6C7C7;*/
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 1rem;
        }

        .text-center {
            text-align: center !important;
        }
        body{
            /*font-family:  "Times New Roman", Times, serif;*/
            font-family: "Times New Roman";
        }
        .title {
            text-align:center;
            position:relative;
            font-size: 24px;
            top:1px;
        }
        .header {
            overflow:hidden;
        }
        .logo {
            background-color:#FFFFFF;
            text-align:left;
            float:left;
        }
        .company {
            padding-top:24px;
            text-transform:uppercase;
            background-color:#FFFFFF;
            text-align:right;
            float:right;
            font-size:16px;
        }
    </style>
</head>
<body>
{{--<div class="header">--}}
{{--    <div class="logo"><img src="{{ asset('img/logo.png') }}"/></div>--}}
{{--    <div class="company">C.Ty TNHH Ngôi Nhà Cà Phê</div>--}}

{{--</div>--}}
{{--<table class="w-full">--}}
{{--    <tr>--}}
{{--        <td class="w-half">--}}
{{--            <img src="{{ asset('img/logo-pdf.png') }}"  width="200"/>--}}
{{--        </td>--}}
{{--        <td class="w-half">--}}
{{--            <div class="company">C.Ty TNHH Ngôi Nhà Cà Phê</div>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--</table>--}}

<div class="title">
    Công Ty TNHH Ngôi Nhà Cà Phê
    <br/>
    <br/>
    <br/>
    HÓA ĐƠN THANH TOÁN
    <br/>
    -------oOo-------
</div>
<div class="margin-top">

    <table class="w-full">
        <tr>
            <td class="w-half">
                <div>  <h2>Đơn hàng: {{$order->id}}</h2></div>
                <div><h4>Tới:</h4></div>
                <div>Người nhận : {{$order->name_receiver}}</div>
                <div>Địa chỉ nhận : {{$order->address_receiver}}</div>
                <div>Số điện thoại nhận : {{$order->phone_receiver}}</div>
                <div>Địa chỉ email : {{$order->email_receiver}}</div>

                {{--                <div>123 Acme Str.</div>--}}
            </td>
            {{--            <td class="w-half">--}}
            {{--                <div><h4>Từ:</h4></div>--}}
            {{--                <div>Laravel Daily</div>--}}
            {{--                <div>London</div>--}}
            {{--            </td>--}}
        </tr>
    </table>
</div>

<div class="margin-top">
    <table class="products">
        <tr>
            <th>Tên</th>
            <th>Giá (đồng)</th>
            <th>Số lượng</th>
        </tr>
        @foreach($orderProduct as $item)
            <tr class="items">
                <td>
                    {{ $item->product_name }}
                </td>
                <td class="text-center">
                    {{ $item->product_price }}
                </td>
                <td class="text-center">
                    {{ $item->qty }}
                </td>
            </tr>
        @endforeach

    </table>
</div>
<div class="total">
    Thành tiền : {{$order->sub_total}}
</div>
<div class="total">
    Phí vận chuyển : {{$order->fee_ship}}
</div>
<div class="total">
    Tổng cộng : {{$order->total}}
</div>
<div>  <h4>Ngày tạo: {{$order->created_at}}</h4></div>


</body>
</html>
