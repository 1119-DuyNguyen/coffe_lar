@if(Session::has('cart'))

<div class="content">
    <div class="detail">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <h6 class="h6 mb-2 text-gray-800 mg-tb">Thông tin sản phẩm</h6>

            <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Giá gốc</th>
                    <th class="td-right">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::get('cart')->products && count(Session::get('cart')->products))
                <?php $count = 1; ?>
                @foreach(Session::get('cart')->products as $key => $value)
                <tr>
                    <td>
                        {{ $count}}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/product').'/'.$value['productInfo']->hinhanh }}" class="img-invoice"
                            alt="{{$value['productInfo']->tensp}}" />
                        {{ $value['productInfo']->tensp ?? "[]" }}
                    </td>
                    <td>
                        {{ $value['size']->size_name }}
                    </td>
                    <td>
                        {{ $value['quanty'] }}
                    </td>
                    <td>
                        {{ currency_format($value['size']->price + $value['productInfo']->giaban) }}
                    </td>
                    <td class="td-right">
                        {{currency_format($value['price'])}}
                    </td>
                </tr>
                <?php $count++; ?>
                @endforeach
                @endif
                <tr class="td-right">
                    <td colspan="4" class="td-right">
                        <b> Tổng tiền sản phẩm :</b>
                    </td>
                    <td colspan="2" class="td-right">
                        <span class="mrg-l10">
                            {{currency_format(Session::get('cart')->totalPrice)}}</span>
                    </td>
                </tr>
                @if(Session::get('cart')->coupon > 0)
                <tr class="td-right">
                    <td colspan="4">
                        <b>Giảm giá :</b><span class="mrg-l10">
                    </td>
                    <td colspan="2" class="td-right">
                        <span class="mrg-l10">
                            - {{currency_format(Session::get('cart')->coupon)}}
                            {{Session::get('cart')->discount ? '('.Session::get('cart')->discount.')' : ''}}
                        </span>
                    </td>
                </tr>
                @endif
                <tr class="td-right">
                    <td colspan="4">
                        <b>Tiền phí vận chuyển : </b>
                    </td>
                    <td colspan="2" class="td-right">
                        <span class="mrg-l10">
                            @if(Session::get('cart')->feeShip)
                            + {{currency_format(Session::get('cart')->feeShip)}}
                            @else
                            {{currency_format(0)}}
                            @endif
                        </span>
                    </td>
                </tr>
                <tr class="td-right">
                    <td colspan="4">
                        <b>Thành tiền :</b>
                    </td>
                    <td colspan="2" class="td-right">
                        <span class="mrg-l10">
                            <?php
                            $price = (Session::get('cart')->totalPrice - Session::get('cart')->coupon + Session::get('cart')->feeShip);
                            ?>
                            {{currency_format($price > 0 ? $price : 0)}}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @endif