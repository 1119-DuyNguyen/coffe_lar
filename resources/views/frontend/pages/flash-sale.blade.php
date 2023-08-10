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
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>flash sell</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">ends time :</span>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>
                        </div>
                    </div>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            simplyCountdown('.simply-countdown-one', {
                year: {{date('Y', strtotime($flashSaleDate->end_date))}},
                month: {{date('m', strtotime($flashSaleDate->end_date))}},
                day: {{date('d', strtotime($flashSaleDate->end_date))}},
            });
            console.log('wtf');
        })

    </script>
@endpush
