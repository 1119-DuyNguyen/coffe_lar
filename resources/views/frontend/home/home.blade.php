@extends('frontend.layouts.master')
@section('title')
    {{$settings->site_name}} || Home
@endsection

@section('content')

    <!--============================
        BANNER PART 2 START
    ==============================-->
    @include('frontend.home.sections.banner-slider')
    <!--============================
        BANNER PART 2 END
    ==============================-->


    <!--============================
        FLASH SELL START
    ==============================-->
    @include('frontend.home.sections.featured-product')
    <!--============================
        FLASH SELL END
    ==============================-->

    <!--============================
        HOT DEALS START
    ==============================-->
{{--    @include('frontend.home.sections.type-product')--}}
    <!--============================
        HOT DEALS END
    ==============================-->


    <!--============================
        BRAND SLIDER START
    ==============================-->
    @include('frontend.home.sections.brand-slider')
    <!--============================
        BRAND SLIDER END
    ==============================-->

    <!--============================
      HOME SERVICES START
    ==============================-->
    @include('frontend.home.sections.services')
    <!--============================
        HOME SERVICES END
    ==============================-->

@endsection
