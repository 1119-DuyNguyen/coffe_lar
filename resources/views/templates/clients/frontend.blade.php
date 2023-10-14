
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="author" content="nguyenthanhduy.id.vn"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @if(isset($meta) && count($meta) > 0)
        <meta property="og:title" content="{{$meta['title']}}"/>
        <meta property="og:description" content="{{$meta['description']}}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="{{$meta['url']}}"/>
        <meta property="og:image" content="{{$meta['image'] }}"/>
    @endif

    <title>{{ $setting->name ?? "Drinks Order"}}</title>
    <link rel="icon" href="{{ asset('img/logo.png')}}" type="image/gif" sizes="16x16">
    <!-- Custom CSS -->
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('backend/assets/alert/alertify.min.js') }}"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/themify-icons/themify-icons.css')}}"/>

    <!-- <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/semantic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/alert/css/themes/bootstrap.css') }}" /> -->
    @livewireStyles
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>--}}
</head>

<body class="grocery-theme">


@include('templates.clients.layouts.header')
@yield('content')
<!--========= JS Here =========-->
<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/smoothproducts.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-rating.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jQuery.style.switcher.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
{{--<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>--}}
<script src="{{ asset('frontend/assets/js/firebase.js') }}"></script>
<script src="{{ asset('frontend/assets/js/js.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}
<!-- js confirm -->
<link rel="stylesheet" href="{{asset('lib/sweetalert/sweetalert.all.min.css')}}">

<link href="{!! asset('jsconfirm/jquery-confirm.min.css') !!}" rel="stylesheet">
<script src="{!! asset('jsconfirm/jquery-confirm.min.js') !!}"></script>
<script src="{{asset('lib/sweetalert/sweetalert.all.min.js')}}"></script>

@include('templates.clients.layouts.footer')

@stack('modal')


<script>


    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }
</script>
@livewireScripts
@include('templates.clients.js.js')
@include('templates.clients.js.notification')
@stack('scripts')

@include('sweetalert::alert')

</body>

</html>
