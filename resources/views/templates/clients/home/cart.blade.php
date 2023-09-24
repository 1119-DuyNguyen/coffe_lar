@if(Session::has('cart') != null && Session::get('cart')->products)

<div class="cart_select_items">
    @foreach(Session::get('cart')->products as $key => $value)
    <div class="cart_selected_single">
        <div class="cart_selected_single_thumb">
            <a href="#"><img src="{{ asset('uploads/product').'/'.$value['productInfo']->hinhanh }}" class="img-fluid"
                    alt="" /></a>
        </div>
        <div class="cart_selected_single_caption">
            <a href="javascript:" id="upCart" data-key="{{$key}}">
                <h4 class="product_title">{{$value['productInfo']->tensp}}</h4>
            </a>
            <span class="numberof_item">Số lượng : {{$value['quanty']}}</span>
            <span class="sizeof_item">Size : {{$value['size']->size_name}} -
                {{ currency_format($value['productInfo']->giaban + $value['size']->price)}}</span>
            <a href="#" class="text-danger btn-cart-del" id="delItemCart" data-id="{{$key}}">Xoá</a>
        </div>
    </div>
    @endforeach
</div>

<div class="cart_subtotal priceTotal">
    <h6>Tổng đơn hàng<span class="theme-cl carsub">{{currency_format(Session::get('cart')->totalPrice, 'đ')}}</span>
    </h6>
    <div class="not-cart">
        <?php
        $feeship = null;
        $tongtien = Session::get('cart')->totalPrice;
        if (Session::has('feeship') != null) {
            $feeship = Session::get('feeship')->feeship;
        }
        ?>
        @if(Session::has('coupon') != null)
        <h6>Mã Giảm Giá<span class="theme-cl"> -
                @if(Session::get('coupon')->loaigiam === 1)
                {{currency_format(Session::get('coupon')->giamgia, '%')}}

                @endif
                @if(Session::get('coupon')->loaigiam === 2)
                {{currency_format(Session::get('coupon')->giamgia, 'đ')}}
                @endif
            </span></h6>
        @endif
        @if(Session::has('feeship'))
        <h6>Phí vận chuyển<span class="theme-cl"> +
                {{ currency_format($feeship)}}
            </span></h6>

        @else
        <h6>Phí vận chuyển<span style="font-size: 15px;">
                Không hỗ trợ vận chuyển.
            </span></h6>
        @endif
        @if(Session::has('coupon') != null)
        <h6>Tổng tiền<span class="theme-cl">
                @if(Session::has('cart') != null && Session::get('cart')->products)

                <!-- nếu giảm % -->
                @if(Session::get('coupon')->loaigiam === 1)
                <?php
                $tongtien = (Session::get('cart')->totalPrice -
                    Session::get('cart')->totalPrice * Session::get('coupon')->giamgia / 100);
                ?>
                {{currency_format(( $tongtien + $feeship), 'đ')}}
                @endif
                <!-- nếu giảm tiền -->
                @if(Session::get('coupon')->loaigiam === 2)
                <?php
                $tongtien = (Session::get('cart')->totalPrice - Session::get('coupon')->giamgia);
                ?>
                {{currency_format($tongtien + $feeship, 'đ')}}
                @endif
                @endif
            </span></h6>
        @else
        <h6>Tổng tiền<span class="theme-cl">
                @if(Session::has('cart') != null && Session::get('cart')->products)
                {{currency_format(($tongtien + $feeship), 'đ')}}
                @endif
            </span></h6>
        @endif
    </div>

    <input id="checkFeeship" hidden type="number" value="{{$feeship}}">
    <input id="totalPrice" hidden type="number" data-price="{{currency_format(Session::get('cart')->totalPrice, 'đ')}}"
        value="">
    <input id="totalQuanty" hidden type="number" value="{{ Session::get('cart')->totalQuanty}}">
</div>
@endif