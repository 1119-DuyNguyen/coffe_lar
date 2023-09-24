@extends('templates.clients.frontend')
@section('content')

    <!-- ======================== Banner End ==================== -->

    <!-- ======================== Choose Category Start ==================== -->
    <section class="pt-0 pb-0 bg-pink">
        <div class="w-80">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="owl-carousel category-slider owl-theme">

                            <!-- Single Item -->
                            @if($danhmuc)
                                @foreach($danhmuc as $value)
                                    <div class="item cate">
                                        <div class="woo_category_box border_style rounded slide-cate">
                                            <div class="woo_cat_thumb">
                                                <a href="{{ route('product.index')}}"><img
                                                        src="{{ asset('uploads/categories/'.$value->thumb_image)}}"
                                                        class="img-fluid"
                                                        alt=""/></a>
                                            </div>
                                            <div class="woo_cat_caption">
                                                <h4><a href="search-sidebar.html">{{$value->tenloai}}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="pt-0">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-heading-flex ">
                        <div class="sec-heading-flex-one">
                            <h2 class="text-animation" data-text="Sản Phẩm Đang khuyến mãi">Sản Phẩm Đang khuyến
                                mãi</h2>
                            <span class="line"></span>
                        </div>
                        <!-- <div class="sec-heading-flex-last">
						<a href="{{route('product.index')}}" class="btn btn-theme">Xem thêm<i class="fas fa-arrow-right ml-2"></i></a>
					</div> -->
                    </div>
                </div>
            </div>

            {{--        <div class="row">--}}
            {{--            <div class="col-lg-12 col-md-12">--}}
            {{--                <div class="owl-carousel products-hot owl-theme">--}}
            {{--                    @if($promotion)--}}
            {{--                    @foreach($promotion as $value)--}}
            {{--                    <!-- Single Item -->--}}
            {{--                    <div class="item">--}}
            {{--                        <div class="woo_product_grid">--}}
            {{--                            <span class="woo_offer_sell">--}}
            {{--                                ---}}
            {{--                                {{currency_format($value->Coupon[0]->giamgia, ($value->Coupon[0]->loaigiam === 2) ? 'đ' : '%')}}</span>--}}
            {{--                            <div class="woo_product_thumb">--}}
            {{--                                <img src="{{ asset('uploads/product/'.$value->thumb_image)}}" class="img-fluid" alt="" />--}}
            {{--                            </div>--}}
            {{--                            <div class="woo_product_caption center">--}}
            {{--                                <div class="woo_title">--}}
            {{--                                    <h4 class="woo_pro_title"><a--}}
            {{--                                            href="{{route('product.show', $value->slug)}}">{{$value->tensp}}</a></h4>--}}
            {{--                                </div>--}}
            {{--                                <div class="woo_price ">--}}
            {{--                                    <?php--}}
            {{--                                    $price = 0;--}}
            {{--                                    if ($value->Coupon[0]->loaigiam === 2) {--}}
            {{--                                        $price = $value->giaban - $value->Coupon[0]->giamgia;--}}
            {{--                                    } else {--}}
            {{--                                        $price = $value->giaban - ($value->giaban * $value->Coupon[0]->giamgia / 100);--}}
            {{--                                    }--}}
            {{--                                    ?>--}}
            {{--                                    <h6>{{currency_format($price, 'đ')}}<span--}}
            {{--                                            class="less_price">{{currency_format($value->giaban, 'đ')}}</span>--}}
            {{--                                    </h6>--}}
            {{--                                    <a href="javascript:" class="btn-plus quickView" data-id="{{$value->id}}"><i--}}
            {{--                                            class="fa fa-plus-circle" aria-hidden="true"></i></a>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    @endforeach--}}
            {{--                    @endif--}}


            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
    </section>
    <div class="clearfix"></div>


    <section class="pt-0 ">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-heading-flex ">
                        <div class="sec-heading-flex-one">
                            <h2>Sản Phẩm Mới</h2>
                        </div>
                        <!-- <div class="sec-heading-flex-last">
						<a href="{{route('product.index')}}" class="btn btn-theme">Xem thêm<i class="fas fa-arrow-right ml-2"></i></a>
					</div> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel products-slider owl-theme owl-loaded owl-drag">
                        @if($productNew)
                            @foreach($productNew as $value)
                                <!-- Single Item -->
                                <div class="item">
                                    <div class="woo_product_grid">
                                        <span class="woo_pr_tag hot">Mới</span>
                                        {{--                            @if(count($value->Coupon) > 0)--}}
                                        {{--                            <span class="woo_offer_sell">--}}
                                        {{--                                ---}}
                                        {{--                                {{currency_format($value->Coupon[0]->giamgia, ($value->Coupon[0]->loaigiam === 2) ? 'đ' : '%')}}</span>--}}
                                        {{--                            @endif--}}
                                        <div class="woo_product_thumb">
                                            <img src="{{ asset('uploads/product/'.$value->thumb_image)}}"
                                                 class="img-fluid" alt=""/>
                                        </div>
                                        <div class="woo_product_caption center">
                                            <div class="woo_title">
                                                <h4 class="woo_pro_title"><a
                                                        href="{{route('product.show', $value->slug)}}">{{$value->tensp}}</a>
                                                </h4>
                                            </div>
                                            <div class="woo_price ">
                                                <h6>
                                                    @if(false&&count($value->Coupon) > 0)
                                                            <?php
                                                            $price = 0;
                                                            if ($value->Coupon[0]->loaigiam === 2) {
                                                                $price = $value->giaban - $value->Coupon[0]->giamgia;
                                                            } else {
                                                                $price = $value->giaban - ($value->giaban * $value->Coupon[0]->giamgia / 100);
                                                            }
                                                            ?>
                                                        {{currency_format($price)}}
                                                        <span class="less_price">
                                            {{currency_format($value->giaban)}}
                                        </span>
                                                    @else
                                                        {{currency_format($value->giaban)}}
                                                    @endif
                                                </h6>
                                                <a href="javascript:" class="btn-plus quickView"
                                                   data-id="{{$value->id}}"><i
                                                        class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>


    <div class="all-product">
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="sec-heading-flex ">
                            <div class="sec-heading-flex-one center">
                                <h2>Các Sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tabs">
                            @if($danhmuc)
                                @foreach($danhmuc as $key => $value)
                                    <div class="tab-item {{$key == 0 ? 'active' : ''}}">
                                        <div class="item">
                                            <div class="woo_category_box border_style rounded">
                                                <div class="woo_cat_thumb">
                                                    <a href="javascript:"><img
                                                            src="{{ asset('uploads/categories/'.$value->thumb_image)}}"
                                                            class="img-fluid" alt=""/></a>
                                                </div>
                                                <div class="woo_cat_caption">
                                                    <h4><a href="javascript:" class="bold">{{$value->tenloai}}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="content">
                            @if($danhmuc)
                                @foreach($danhmuc as $key => $value)

                                    <div class="tab-pane {{$key == 0 ? 'active' : ''}}">
                                        <div class="list-product">
                                            @if($product)
                                                @foreach($product as $val)
                                                    @if ($val->category_id == $value->id)
                                                        <x-product :product="$val"></x-product>
{{--                                                        <div class="item">--}}
{{--                                                            <div class="woo_product_grid">--}}
{{--                                                                --}}{{--                                        @if(count($val->Coupon) > 0)--}}
{{--                                                                --}}{{--                                        <span class="woo_offer_sell">--}}
{{--                                                                --}}{{--                                            ---}}
{{--                                                                --}}{{--                                            {{currency_format($val->Coupon[0]->giamgia, ($val->Coupon[0]->loaigiam === 2) ? 'đ' : '%')}}</span>--}}
{{--                                                                --}}{{--                                        @endif--}}
{{--                                                                <div class="woo_product_thumb">--}}
{{--                                                                    <img--}}
{{--                                                                        src="{{ asset('uploads/product/'.$val->thumb_image)}}"--}}
{{--                                                                        class="img-fluid"--}}
{{--                                                                        alt=""/>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="woo_product_caption center">--}}
{{--                                                                    <div class="woo_title">--}}
{{--                                                                        <h4 class="woo_pro_title"><a--}}
{{--                                                                                href="{{route('product.show', $val->slug)}}">{{$val->tensp}}</a>--}}
{{--                                                                        </h4>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="woo_price ">--}}
{{--                                                                        <h6>--}}
{{--                                                                            @if(false&&count($val->Coupon) > 0)--}}
{{--                                                                                    <?php--}}
{{--                                                                                    $price = 0;--}}
{{--                                                                                    if ($val->Coupon[0]->loaigiam === 2) {--}}
{{--                                                                                        $price = $val->giaban - $val->Coupon[0]->giamgia;--}}
{{--                                                                                    } else {--}}
{{--                                                                                        $price = $val->giaban - ($val->giaban * $val->Coupon[0]->giamgia / 100);--}}
{{--                                                                                    }--}}
{{--                                                                                    ?>--}}
{{--                                                                                {{currency_format($price)}}--}}
{{--                                                                                <span class="less_price">--}}
{{--                                                        {{currency_format($val->giaban)}}--}}
{{--                                                    </span>--}}
{{--                                                                            @else--}}
{{--                                                                                {{currency_format($val->giaban)}}--}}
{{--                                                                            @endif--}}
{{--                                                                        </h6>--}}
{{--                                                                        <a href="javascript:" class="btn-plus quickView"--}}
{{--                                                                           data-id="{{$val->id}}"><i--}}
{{--                                                                                class="fa fa-plus-circle"--}}
{{--                                                                                aria-hidden="true"></i></a>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="sec-heading-flex-last">
                        <a href="{{ route('product.index')}}" class="btn btn-theme">Xem tất cả <i
                                class="fas fa-arrow-right mgl-5"> </i></a>
                    </div>
                </div>
            </div>

        </section>
    </div>

@stop
