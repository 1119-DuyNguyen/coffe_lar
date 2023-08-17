@php use App\Models\Product; @endphp
@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Flash Sale
@endsection

@section('content')



    <!--============================
            DAILY DEALS DETAILS START
        ==============================-->
    <section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">
                <div class="row">

                </div>


                <div class="row">
                    @foreach ($flashSaleItems as $item)
                        @php
                            $product = $item->product;
                        @endphp
                        <x-product :product="$product"></x-product>

                    @endforeach
                </div>
                <div class="mt-5">
                    @if ($flashSaleItems->hasPages())
                        {{$flashSaleItems->links()}}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================
            DAILY DEALS DETAILS END
        ==============================-->

@endsection

