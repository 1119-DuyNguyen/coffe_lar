@if($order)
<div class="row">
    <div class="col-12 card-search mt-4">
        <div class="card-search-header">
            <h5 class="card-title mb-0"><i class="fa fa-shopping-bag"></i> Thông tin đơn hàng</h5>
        </div>
        <div class="card-search-body row">
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Mã đơn hàng: </span> <span class="text-search-con">{{$order->madh}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Ngày mua: </span> <span
                    class="text-search-con">{{ format_date($order->ngaytao)}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Tổng tiền: </span> <span
                    class="text-search-con">{{currency_format($order->tongtien)}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Trạng thái: </span>
                <div class="badge badge-{{ $order->getStatus($order->trangthai)['class']}} ">
                    {{ $order->getStatus($order->trangthai)['name']}}
                </div>
            </div>
            <div class="col-12">
                <div class="progress-status">

                    <div class="progress">
                        <ul>
                            @if($order->trangthai == -1)
                            <li class="step step01  whiteT {{ ($order->trangthai >= -1 ) ? 'active cancelT' : ''}}">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <div class="step-inner"></div>
                            </li>
                            <li class="step step02 {{ ($order->trangthai >= -1 ) ? 'active cancelT' : ''}}">
                                <i class="fa fa-ban" aria-hidden="true"></i>
                                <div class="step-inner">Đã huỷ</div>
                            </li>
                            @else
                            <li class="step step01  {{ ($order->trangthai >= 1 ) ? 'active' : ''}}">
                                <i class="fa fa-spinner" aria-hidden="true"></i>
                                <div class="step-inner">Chờ xác nhận</div>
                            </li>
                            <li class="step step02 {{ ($order->trangthai >= 2 ) ? 'active' : ''}}">
                                <i class="fa fas fa-sync-alt" aria-hidden="true"></i>
                                <div class="step-inner">Đang xử lí</div>
                            </li>
                            <li class="step step03 {{ ($order->trangthai >= 3 ) ? 'active' : ''}}">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                <div class="step-inner">Đang vận chuyển</div>
                            </li>
                            <li class="step step04 {{ ($order->trangthai >= 4 ) ? 'active' : ''}}">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <div class="step-inner">Đã giao</div>
                            </li>
                            @endif
                        </ul>

                        <div class="line {{ $order->trangthai == -1  ? 'cancel' : ''}}">
                            <div class="line-progress {{ $order->getStatus($order->trangthai)['progress']}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 card-search mt-4">
        <div class="card-search-header">
            <h5 class="card-title mb-0"><i class="fa fa-user"></i> Thông tin khách hàng</h5>
        </div>
        <div class="card-search-body row">
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Tên khách hàng: </span> <span
                    class="text-search-con">{{$order->hoten}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">SĐT: </span> <span>{{$order->dienthoai}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Email: </span> <span>{{$order->email}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Địa chỉ: </span>
                <span>{{ $order->diachi}}</span>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Thông tin thanh toán: </span>
                @if($order->trangthaithanhtoan == 1 )
                <div class="badge badge-success">Đã thanh toán</div>
                @else
                <div class="badge badge-warning">Chờ thanh toán</div>
                @endif
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="text-search-ti">Ghi chú: </span>
                <span>{{ $order->ghichu ?? '---'}}</span>
            </div>
        </div>
    </div>
    <div class="col-12 card-search mt-4">
        <div class="card-search-header">
            <h5 class="card-title mb-0"><i class="fa fa-tasks"></i> Thông tin sản phẩm</h5>
        </div>
        <div class="card-search-body row">
            <div class="col-12">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th class="td-right">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orderDetail && count($orderDetail))
                        @foreach($orderDetail as $value)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/product/'.$value->product->hinhanh)}}" class="img-fluid"
                                    alt="" /> {{ $value->product->tensp ?? "[]" }}
                            </td>
                            <td>{{ $value->size->size_name }}</td>
                            <td>
                                {{ $value->soluong }}
                            </td>
                            <td>
                                <?php
                                $giaban = $value->product->giaban + $value->size->price;
                                if ($value->giagoc) {
                                    $down = $value->getCoupon->giamgia;
                                    if ($value->getCoupon->loaigiam == 1) {
                                        $down = $giaban * ($value->getCoupon->giamgia / 100);
                                    }
                                    $giaban = $giaban - $down;
                                }
                                ?>
                                {{ currency_format(($giaban > 0 ) ? $giaban : 0)}}
                            </td>
                            <td class="td-right">
                                {{currency_format($value->giaban)}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <tr class="td-right">
                            <td colspan="4" class="td-right">
                                <b> Tổng tiền sản phẩm :</b>
                            </td>
                            <td class="td-right">
                                <span>
                                    {{currency_format($order->tongdonhang)}}</span>
                            </td>
                        </tr>
                        @if($order->Coupon)
                        <tr class="td-right">
                            <td colspan="4">
                                <b>Giảm giá :</b><span>
                            </td>
                            <td class="td-right">
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
                            <td colspan="4">
                                <b>Tiền phí vận chuyển : </b>
                            </td>
                            <td class="td-right">
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
                            <td colspan="4">
                                <b>Thành tiền :</b>
                            </td>
                            <td class="td-right">
                                <span>
                                    {{currency_format($order->tongtien)}}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(isset($payment))
    <div class="col-12 card-search mt-4">
        <div class="card-search-header">
            <h5 class="card-title mb-0"><i class="fa fa-info"></i> Thông tin thanh toán</h5>
        </div>
        <div class="card-search-body row">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Thời gian</th>
                        <th>Số tiền</th>
                        <th>Trạng thái</th>
                        <th>Mã giao dịch</th>
                        <th>Số hoá đơn</th>
                        <th>Loại thanh toán</th>
                        <th>Mã đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
                            @if($payment->Donhang->httt === 3)
                            <?= date("d-m-Y H:i:s", strtotime($payment->ngaythanhtoan)) ?>
                            @elseif ($payment->Donhang->httt === 2)
                            <?= date("d-m-Y H:i:s ", substr($payment->ngaythanhtoan, 0, 10)) ?>
                            @else
                            {{$payment->ngaythanhtoan}}
                            @endif
                        </td>
                        <td>
                            @if(+$order->httt === 1)
                            {{currency_format($payment->tongtien * 23187)}}
                            @else
                            {{currency_format($payment->tongtien)}}
                            @endif
                        </td>
                        <td>

                            @if($payment->trangthai == 1 )
                            <div class="badge badge-success">Thành công</div>
                            @else
                            <div class="badge badge-danger">Thất bại</div>
                            @endif
                        </td>
                        <td>
                            {{ $payment->magiaodich}}
                        </td>
                        <td>
                            {{ $payment->sohoadon}}
                        </td>
                        <td>
                            {{ $payment->loaithanhtoan}}
                        </td>
                        <td>
                            {{ $payment->Donhang->madh}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@else
<div class="col-12" style="text-align: center; margin-top: 15px;font-size: 20px;
    font-weight: 600;">
    <img src="{{ asset('frontend/img/none.svg')}}" alt="Không tìm thấy"><br>
    <p>Rất tiếc, chúng tôi không tìm thấy kết quả phù hợp. Vui lòng kiểm tra lại mã đơn hàng của bạn.</p>
</div>
@endif