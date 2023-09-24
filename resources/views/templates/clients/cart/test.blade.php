<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pay $1000</title>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
</head>
<body>
    <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay $1000</a>
    <form action="{{ route('vnpayPayment') }}" method="post">
        @csrf
        <button class="btn btn-primary m-3" type="submit" name="redirect">VNpay</button>
    </form>
    <form action="{{ route('momoPayment') }}" method="post">
        @csrf
        <button class="btn btn-primary m-3" type="submit" name="payUrl">Momo</button>
    </form>

    <form action="{{ route('momoPaymentQR') }}" method="post" enctype="application/x-www-form-urlencoded">
        @csrf
        <button class="btn btn-primary m-3" type="submit" name="payUrl">Momo QR</button>
    </form>
    @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif



 </div>
</body>
</html>