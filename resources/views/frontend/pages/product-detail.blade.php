@php use App\Models\Product; @endphp
@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Product Details
@endsection

@section('content')

    <!--============================
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5" style="z-index:100">
                        <div id="sticky_pro_zoom">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if ($product->video_link)
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                           href="{{$product->video_link}}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif
                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{asset($product->thumb_image)}}"
                                                 alt="product"></li>
                                        @foreach ($product->productImageGalleries as $productImage)
                                            <li><img class="zoom ing-fluid w-100" src="{{asset($productImage->image)}}"
                                                     alt="product"></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="fas fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="fas fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="javascript:;">{{$product->name}}</a>
                            @if ($product->qty > 0)
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> ({{$product->qty}}
                                    item)</p>
                            @else
                                <p class="wsus__stock_area"><span class="in_stock">stock out</span> ({{$product->qty}}
                                    item)</p>
                            @endif
                            @if ($product->checkDiscount())
                                <h4>{{$settings->currency_icon}}{{$product->offer_price}}
                                    <del>{{$settings->currency_icon}}{{$product->price}}</del>
                                </h4>
                            @else
                                <h4>{{$settings->currency_icon}}{{$product->price}}</h4>
                            @endif

                            <p class="description">{!! $product->short_description !!}</p>

                            <form class="shopping-cart-form">
                                <div class="wsus__selectbox">
                                    <div class="row">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @foreach ($product->variants as $variant)
                                            @if ($variant->status != 0)
                                                <div class="col-xl-6 col-sm-6">
                                                    <h5 class="mb-2">{{$variant->name}}: </h5>
                                                    <select class="select_2" name="variants_items[]">
                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                            @if ($variantItem->status != 0)
                                                                <option
                                                                    value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}}
                                                                    (${{$variantItem->price}})
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>

                                <div class="wsus__quentity">
                                    <h5>quantity :</h5>
                                    <div class="select_number">
                                        <input class="number_area" name="qty" type="text" min="1" max="{{$product->qty}}" value="1"/>
                                    </div>

                                </div>

                                <ul class="wsus__button_area">
                                    <li>
                                        <button type="submit" class="add_cart" href="#">add to cart</button>
                                    </li>


                                    <li><a style="border: 1px solid gray;
                                        padding: 7px 11px;
                                        border-radius: 100%;" href="javascript:;" class="add_to_wishlist"
                                           data-id="{{$product->id}}"><i class="far fa-heart"></i></a></li>

                                </ul>
                            </form>
                            <p class="brand_model">
                                <span>brand :</span>
                                <a href="{{route('product.index',['brand'=>$product->brand->slug])}}">

                                 {{$product->brand->name}}
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                            data-bs-target="#pills-home22" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">Description
                                    </button>
                                </li>



                            </ul>
                            <div class="tab-content" id="pills-tabContent4">
                                <div class="tab-pane fade  show active " id="pills-home22" role="tabpanel"
                                     aria-labelledby="pills-home-tab7">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__description_area">
                                                {!!$product->long_description!!}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--============================
        PRODUCT DETAILS END
    ==============================-->

@endsection
@push('scripts')
    <script>
        ajaxCartStoreFunction('.shopping-cart-form');
        {{--$(document).ready(function (){--}}
        {{--    $('.shopping-cart-form').on('submit', function (e){--}}
        {{--        e.preventDefault();--}}
        {{--        let formData= $(this).serialize();--}}
        {{--        $.ajax({--}}
        {{--            method:'POST',--}}
        {{--            data: formData,--}}
        {{--            url:'{{route('cart.store')}}',--}}
        {{--            success: function(data){--}}
        {{--                fetchSidebarCartProduct();--}}
        {{--                Swal.fire({--}}
        {{--                    position: 'top-end',--}}
        {{--                    icon: 'success',--}}
        {{--                    title: data.message,--}}
        {{--                    showConfirmButton: false,--}}
        {{--                    timer: 1500--}}
        {{--                })--}}


        {{--            },--}}
        {{--            error: function(data){--}}
        {{--                Swal.fire(--}}
        {{--                    'Something went wrong!',--}}
        {{--                    data.message,--}}
        {{--                    'error'--}}
        {{--                )--}}
        {{--            }--}}
        {{--        })--}}
        {{--    })--}}
        {{--})--}}


    </script>

@endpush

