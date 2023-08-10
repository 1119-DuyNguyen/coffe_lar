@php use App\Models\Product; @endphp
<section id="wsus__flash_sell" class="wsus__flash_sell_2">
    <div class=" container">
        <div class="row">
            <div class="col-xl-12">
                <div class="offer_time" style="background: url({{asset('frontend/images/flash_sell_bg.jpg')}})">
                    <div class="wsus__flash_coundown">
                        <span class=" end_text">Flash Sale</span>
                        <div class="simply-countdown simply-countdown-one"></div>
                        <a class="common_btn" href="{{route('flash-sale')}}">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row flash_sell_slider">
            @foreach ($flashSaleItems as $item)

                <x-product :product="$item->product"></x-product>

            @endforeach
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function () {
            simplyCountdown('.simply-countdown-one', {
                year: {{date('Y', strtotime($flashSaleDate->end_date))}},
                month: {{date('m', strtotime($flashSaleDate->end_date))}},
                day: {{date('d', strtotime($flashSaleDate->end_date))}},
            });
        })
    </script>
@endpush
