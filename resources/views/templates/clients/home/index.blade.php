@extends('templates.clients.frontend')

@section('content')

    <section style="padding-bottom: 20px;
  padding-top: 20px;
  width: 100%;
  background:radial-gradient(100% 501.4% at 100% 100%,#ffb141 0%,#fb8d17 100%);
  ">
        <div class="container-fluid container-lg position-relative">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner pb-5" style="height: auto">
                    <a href="#" class="carousel-item active">
                        <img class="d-block w-100" src="http://coffe-drink.test/uploads/slide/1683694.jpeg"
                             alt="First slide">
                    </a>
                    <a href="#" class="carousel-item">
                        <img class="d-block w-100" src="http://coffe-drink.test/uploads/slide/1683694.jpeg"
                             alt="Second slide">
                    </a>
                    <a href="#" class="carousel-item">
                        <img class="d-block w-100" src="http://coffe-drink.test/uploads/slide/1683694.jpeg"
                             alt="Third slide">
                    </a>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ======================== Banner End ==================== -->



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
                @if($productNew)
                    @foreach($productNew as $value)
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <x-product :product="$value"></x-product>
                            <!-- Single Item -->
                            {{--                                <div class="item">--}}
                            {{--                                    <div class="woo_product_grid">--}}
                            {{--                                        <span class="woo_pr_tag hot">Mới</span>--}}
                            {{--                                        --}}{{--                            @if(count($value->Coupon) > 0)--}}
                            {{--                                        --}}{{--                            <span class="woo_offer_sell">--}}
                            {{--                                        --}}{{--                                ---}}
                            {{--                                        --}}{{--                                {{currency_format($value->Coupon[0]->giamgia, ($value->Coupon[0]->loaigiam === 2) ? 'đ' : '%')}}</span>--}}
                            {{--                                        --}}{{--                            @endif--}}
                            {{--                                        <div class="woo_product_thumb">--}}
                            {{--                                            <img src="{{ asset('uploads/product/'.$value->thumb_image)}}"--}}
                            {{--                                                 class="img-fluid" alt=""/>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="woo_product_caption center">--}}
                            {{--                                            <div class="woo_title">--}}
                            {{--                                                <h4 class="woo_pro_title"><a--}}
                            {{--                                                        href="{{route('product.show', $value->slug)}}">{{$value->tensp}}</a>--}}
                            {{--                                                </h4>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="woo_price ">--}}
                            {{--                                                <h6>--}}
                            {{--                                                    @if(false&&count($value->Coupon) > 0)--}}
                            {{--                                                            <?php--}}
                            {{--                                                            $price = 0;--}}
                            {{--                                                            if ($value->Coupon[0]->loaigiam === 2) {--}}
                            {{--                                                                $price = $value->giaban - $value->Coupon[0]->giamgia;--}}
                            {{--                                                            } else {--}}
                            {{--                                                                $price = $value->giaban - ($value->giaban * $value->Coupon[0]->giamgia / 100);--}}
                            {{--                                                            }--}}
                            {{--                                                            ?>--}}
                            {{--                                                        {{currency_format($price)}}--}}
                            {{--                                                        <span class="less_price">--}}
                            {{--                                            {{currency_format($value->giaban)}}--}}
                            {{--                                        </span>--}}
                            {{--                                                    @else--}}
                            {{--                                                        {{currency_format($value->giaban)}}--}}
                            {{--                                                    @endif--}}
                            {{--                                                </h6>--}}
                            {{--                                                <a href="javascript:" class="btn-plus quickView"--}}
                            {{--                                                   data-id="{{$value->id}}"><i--}}
                            {{--                                                        class="fa fa-plus-circle" aria-hidden="true"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                    </div>--}}
                            {{--                                </div>--}}


                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="pt-0 ">



            <livewire:product-search/>

    </section>
    <div class="clearfix"></div>
@stop
