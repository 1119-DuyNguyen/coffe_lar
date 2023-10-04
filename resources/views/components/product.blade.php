
@props(['product'])
@if($product)
            <!-- Single Item -->
                <div class="item">
                    {{$slot}}
                    <div class="woo_product_grid">
{{--                        @if(count($product->Coupon) > 0)--}}
{{--                            <span class="woo_offer_sell">--}}
{{--                                    ---}}
{{--                                    {{currency_format($product->Coupon[0]->giamgia, (+$product->Coupon[0]->loaigiam === 2) ? 'đ' : '%')}}</span>--}}
{{--                        @endif--}}
{{--                        <div class="woo_product_thumb">--}}
{{--                            <img src="{{ asset('uploads/product/'.$product->thumb_image)}}" class="img-fluid" alt="" />--}}
{{--                        </div>--}}

                        <div class="woo_product_caption center">
                            <div class="woo_title">
                                <h4 class="woo_pro_title"><a
                                        href="{{route('product.show', $product->slug)}}">
                                        <span  class="woo_product_thumb mb-3">

                                        <img src="{{ asset('uploads/product/'.$product->thumb_image)}}" class="img-fluid" alt="" />
                                        </span>

                                        {{$product->name}}</a></h4>
                            </div>
                            <div class="woo_price ">
                                <h6>
                                    @if(false&&count($product->Coupon) > 0)
                                            <?php
                                            $price = 0;
                                            if (+$product->Coupon[0]->loaigiam === 2) {
                                                $price = $product->price - $product->Coupon[0]->giamgia;
                                            } else {
                                                $price = $product->price - ($product->price * $product->Coupon[0]->giamgia / 100);
                                            }
                                            ?>
                                        {{currency_format($price)}}
                                        <span class="less_price">
                                                {{currency_format($product->price)}}
                                            </span>
                                    @else
                                        {{currency_format($product->price)}}
                                    @endif
                                </h6>
                                <a href="javascript:" class="btn-plus quickView" data-slug="{{$product->slug}}"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
@endif
