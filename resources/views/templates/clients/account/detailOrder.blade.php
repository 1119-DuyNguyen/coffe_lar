<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <h4 class="h4 mb-2 text-gray-800 mg-tb">Thông tin sản phẩm #{{$order->madh}}</h4>
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th class="td-right">Giá bán</th>
        </tr>
    </thead>
    <tbody>
        @if($orderDetail && count($orderDetail))
        @foreach($orderDetail as $value)
        <tr>
            <td>{{ $value->product->tensp ?? "[]" }}</td>
            <td>{{ $value->size->size_name }}</td>
            <td>
                {{ $value->soluong }}
            </td>
            <td class="td-right">
                {{currency_format($value->giaban)}}
            </td>
        </tr>
        @endforeach
        <tr class="td-right">
            <td colspan="3" class="td-right">
                <b> Tổng tiền sản phẩm :</b>
            </td>
            <td colspan="2" class="td-right">
                <span>
                    {{currency_format($order->tongdonhang)}}</span>
            </td>
        </tr>
        @if($order->Coupon)
        <tr class="td-right">
            <td colspan="3">
                <b>Giảm giá :</b><span>
            </td>
            <td colspan="2" class="td-right">
                <span class="no-wrap">
                    @if($order->Coupon->loaigiam === 1)
                    <span> {{ $order->Coupon->giamgia}}%
                        ( -
                        {{currency_format($order->tongdonhang *  $order->Coupon->giamgia / 100)}}
                        )</span>
                    @else
                    <span> -
                        {{currency_format($order->Coupon->giamgia)}}</span>
                    @endif
                </span>
            </td>
        </tr>
        @endif
        <tr class="td-right">
            <td colspan="3">
                <b>Tiền phí vận chuyển : </b>
            </td>
            <td colspan="2" class="td-right">
                <span>
                    @if($order->id_feeship && $order->Ship->feeship)
                    + {{currency_format($order->Ship->feeship)}}
                    @else
                    {{currency_format(0)}}
                    @endif
                </span>
            </td>
        </tr>
        <tr class="td-right">
            <td colspan="3">
                <b>Thành tiền :</b>
            </td>
            <td colspan="2" class="td-right">
                <span>
                    {{currency_format($order->tongtien)}}
                </span>
            </td>
        </tr>
        @endif
    </tbody>
</table>