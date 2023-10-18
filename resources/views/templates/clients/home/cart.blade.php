@php
    use Illuminate\Support\Facades\Session;$carts=App\Http\Services\CartService::getListCart();
    $cartList=$carts['cartList'] ??[];
    $subtotal=$carts['subtotal']??[];
@endphp

@if(!empty($carts) && count($carts)>0)
    <div class="cart_subtotal priceTotal">
        <h6>Tổng đơn hàng<span class="carsub">{{ currency_format($subtotal, 'đ') }}</span>
        </h6>
        <div class="not-cart">


            @isset($feeship)
                <h6>Phí vận chuyển<span>
                            {{ currency_format($feeship)}}
                        </span></h6>
                @if($feeship<0)
                    <h6>Phí vận chuyển<span>
                            Không hỗ trợ vận chuyển
                        </span></h6>
                @endif
            @else

                <h6>Phí vận chuyển<span>
                            -
                        </span></h6>
            @endif

        </div>
        <h6>Tổng tiền<span class="theme-cl">
                    {{currency_format(($subtotal + ($feeship??0)), 'đ')}}
            </span></h6>

        {{--        <input id="checkFeeship" hidden type="number" value="{{$feeship}}">--}}
        {{--        <input id="totalPrice" hidden type="number"--}}
        {{--               data-price="{{currency_format(Session::get('cart')->totalPrice, 'đ')}}"--}}
        {{--               value="">--}}
        <input id="totalCartQuantity" hidden type="number" value="{{ count($cartList)}}">
    </div>
    <div class="cart_select_items">
        @foreach($cartList as $key => $cart)
            @php

                $product=$cart['product-data'];
            @endphp
            <div class="cart_selected_single">
                <div class="cart_selected_single_thumb">
                    <a href="#"><img src="{{ asset($product->thumb_image)}}"
                                     class="img-fluid"
                                     alt=""/></a>
                </div>
                <div class="cart_selected_single_caption">
                    <a href="javascript:" class="quick-cart" data-id="{{$key}}">
                        <h4 class="product_title">{{$product->name}}</h4>
                    </a>
                    <span class="numberof_item">Số lượng : {{$product->quantity}}</span>
                    {{--                    @foreach($variantList as $variant)--}}

                    {{--                        <span class="sizeof_item">{{$variant->name}} :--}}
                    {{--                            <span class="sizeof_item">--}}

                    {{--                                    {{ $variant->productVariantItems->implode('name',',')}}--}}

                    {{--                            <br>--}}
                    {{--                               </span>--}}
                    {{--                            </span>--}}
                    {{--                    @endforeach--}}
                    <strong>{{ currency_format($product->price )}}</strong>

                    <a href="#" class="text-danger btn-cart-del mt-1" id="delItemCart" data-id="{{$key}}">Xoá</a>
                </div>
            </div>
        @endforeach
    </div>

@endif
