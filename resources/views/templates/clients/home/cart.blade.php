@php
    $carts=App\Http\Services\CartService::getListCart();
    $cartList=$carts['cartList'] ??[];
    $totalAmount=$carts['total']??[];
    @endphp

@if(!empty($carts) && count($carts)>0)

    <div class="cart_select_items">
        @foreach($cartList as $key => $cart)
            @php

                $product=$cart['product-data'];
                $variantList=$product->variants;
            @endphp
            <div class="cart_selected_single">
                <div class="cart_selected_single_thumb">
                    <a href="#"><img src="{{ asset('uploads/product').'/'.$product->thumb_image }}"
                                     class="img-fluid"
                                     alt=""/></a>
                </div>
                <div class="cart_selected_single_caption">
                    <a href="javascript:" class="quick-cart" data-id="{{$key}}">
                        <h4 class="product_title">{{$product->name}}</h4>
                    </a>
                    <span class="numberof_item">Số lượng : {{$product->quantity}}</span>
                    @foreach($variantList as $variant)

                        <span class="sizeof_item">{{$variant->name}} :
                            <span class="sizeof_item">

                                    {{ $variant->productVariantItems->implode('name',',')}}
                                {{--                                @if(isset($item->price)&&$item->price>0)--}}
                                {{--                                    {{' - '. currency_format($item->price)}}--}}
                                {{--                                @endif--}}
                            <br>
                               </span>
                            </span>
                    @endforeach
                    <strong>{{ currency_format($product->price + $product->variantTotalAmount)}}</strong>

                    <a href="#" class="text-danger btn-cart-del mt-1" id="delItemCart" data-id="{{$key}}">Xoá</a>
                </div>
            </div>
        @endforeach
    </div>

        <div class="cart_subtotal priceTotal">
            <h6>Tổng đơn hàng<span class="theme-cl carsub">{{ currency_format($totalAmount, 'đ') }}</span>
            </h6>
{{--            <div class="not-cart">--}}
{{--                    <?php--}}
{{--                    $feeship = null;--}}
{{--                    $tongtien = Session::get('cart')->totalPrice;--}}
{{--                    if (Session::has('feeship') != null) {--}}
{{--                        $feeship = Session::get('feeship')->feeship;--}}
{{--                    }--}}
{{--                    ?>--}}
{{--                @if(Session::has('coupon') != null)--}}
{{--                    <h6>Mã Giảm Giá<span class="theme-cl"> ---}}
{{--                    @if(Session::get('coupon')->loaigiam === 1)--}}
{{--                                {{currency_format(Session::get('coupon')->giamgia, '%')}}--}}

{{--                            @endif--}}
{{--                            @if(Session::get('coupon')->loaigiam === 2)--}}
{{--                                {{currency_format(Session::get('coupon')->giamgia, 'đ')}}--}}
{{--                            @endif--}}
{{--                </span></h6>--}}
{{--                @endif--}}
{{--                @if(Session::has('feeship'))--}}
{{--                    <h6>Phí vận chuyển<span class="theme-cl"> +--}}
{{--                    {{ currency_format($feeship)}}--}}
{{--                </span></h6>--}}

{{--                @else--}}
{{--                    <h6>Phí vận chuyển<span style="font-size: 15px;">--}}
{{--                    Không hỗ trợ vận chuyển.--}}
{{--                </span></h6>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--            <input id="checkFeeship" hidden type="number" value="{{$feeship}}">--}}
{{--            <input id="totalPrice" hidden type="number"--}}
{{--                   data-price="{{currency_format(Session::get('cart')->totalPrice, 'đ')}}"--}}
{{--                   value="">--}}
            <input id="totalCartQuantity" hidden type="number" value="{{ count($cartList)}}">
        </div>
@endif
