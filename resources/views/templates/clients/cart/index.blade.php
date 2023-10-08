@extends('templates.clients.frontend')
@section('content')

    <!-- =========================== Billing Section =================================== -->
    <section>
        <div class="container">
            <form action="{{ route('user.checkout') }}" method="POST" class="submitOrder">
                @csrf
                <div class="row">

                    <div class="col-lg-7 col-md-12">
                        <!-- Heading -->
                        <h4 class="mb-5">Thông tin giao hàng</h4>

                        <!-- Billing details -->
                        <div class="row mb-3 mb-30">

                            <div class="col-12">
                                <!-- Email -->
                                <div class="form-group">
                                    <input class="form-control form-control-sm" require name="name"
                                           value="{{ get_user('customer', 'ten') ?? '' }}" type="text"
                                           placeholder="Họ tên"
                                           required="">
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- Email -->
                                <div class="form-group">
                                    <input class="form-control form-control-sm" require type="number"
                                           value="{{ get_user('customer', 'sodienthoai') ?? '' }}" name="phone"
                                           placeholder="Số điện thoại" required="">
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- Company Name -->
                                <div class="form-group">
                                    <input class="form-control form-control-sm" require type="email"
                                           value="{{ get_user('customer', 'email') ?? '' }}" name="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Country -->
                                <div class="form-group">
                                    <textarea class="form-control form-control-sm mb-9 mb-md-0 font-size-xs" name="note"
                                              id="checkoutBillingCountry"
                                              rows="5" placeholder="Ghi chú"></textarea>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="location_group form-group province">
                                    <label>Tỉnh /Thành phố</label>
                                    <select type="text" value="" name="province"
                                            class="input_search province" required>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="location_group form-group district">
                                    <label>Quận</label>

                                    <select type="text" value="" name="district" required
                                            class="input_search district">

                                    </select>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="location_group form-group ward">
                                    <label>Phường / Xã</label>
                                    <select type="text" value="" name="ward" required
                                            class="input_search ward">
                                    </select>
                                </div>


                            </div>
                            <div class="col-12">
                                <!-- Company Name -->
                                <div class="form-group">
                                    <input class="form-control form-control-sm" require type="text"
                                           value="{{ get_user('customer', 'diachi') ?? '' }}" require name="address"
                                           placeholder="Địa chỉ chi tiết">
                                </div>
                            </div>

                        </div>

                        <!-- Heading -->
                        <h4 class="mb-3 ">Phương thức thanh toán</h4>

                        <!-- List group -->
                        <div class="list-group list-group-sm mb-5">
                            <div class="list-group-item">
                                <!-- Radio -->
                                <div class="custom-control custom-radio">
                                    <!-- Input -->
                                    <input class="custom-control-input" id="cod" name="payment" checked value="0"
                                           type="radio">
                                    <!-- Label -->
                                    <label class="custom-control-label font-size-sm text-body text-nowrap"
                                           for="cod"><img src="{{ asset('frontend/assets/img/cod.jpg') }}"
                                                          alt="..."> Tiền mặt</label>
                                </div>
                            </div>

{{--                            <div class="list-group-item">--}}
{{--                                <!-- Radio -->--}}
{{--                                <div class="custom-control custom-radio">--}}
{{--                                    <!-- Input -->--}}
{{--                                    <input class="custom-control-input" id="checkoutPaymentPaypal" name="payment"--}}
{{--                                           value="1" type="radio">--}}
{{--                                    <!-- Label -->--}}
{{--                                    <label class="custom-control-label font-size-sm text-body text-nowrap"--}}
{{--                                           for="checkoutPaymentPaypal"><img--}}
{{--                                            src="{{ asset('frontend/assets/img/paypal.png') }}" alt="...">--}}
{{--                                        Paypal</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="list-group-item">--}}
{{--                                <!-- Radio -->--}}
{{--                                <div class="custom-control custom-radio">--}}
{{--                                    <!-- Input -->--}}
{{--                                    <input class="custom-control-input" id="momo" name="payment" value="2"--}}
{{--                                           type="radio">--}}
{{--                                    <!-- Label -->--}}
{{--                                    <label class="custom-control-label font-size-sm text-body text-nowrap"--}}
{{--                                           for="momo"><img src="{{ asset('frontend/assets/img/momo.png') }}"--}}
{{--                                                           alt="..."> Momo</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="list-group-item">--}}
{{--                                <!-- Radio -->--}}
{{--                                <div class="custom-control custom-radio">--}}
{{--                                    <!-- Input -->--}}
{{--                                    <input class="custom-control-input" id="vnpay" name="payment" value="3"--}}
{{--                                           type="radio">--}}
{{--                                    <!-- Label -->--}}
{{--                                    <label class="custom-control-label font-size-sm text-body text-nowrap"--}}
{{--                                           for="vnpay"><img src="{{ asset('frontend/assets/img/vnpay.png') }}"--}}
{{--                                                            alt="..."> Vnpay</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">


                        <div class="right-ch-sideBar item-cart" id="cart">
                            @include('templates.clients.home.cart')

                        </div>

                        <div class="cart_action">
                            <ul>
                                <li>
                                    <button type="submit" class="btn btn-checkout">Thanh toán</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>


    <!-- =========================== Billing Section =================================== -->

    <!-- ============================ Call To Action ================================== -->



    <!-- ============================ Call To Action ================================== -->


    <script>
        window.onload = () => {

            const submitOrder = document.querySelector('.submitOrder');

            const inputSearch = document.querySelectorAll('.location_group .input_search');

            const app = {

                dataLocation: [],
                provinceName: "Province",
                districtName: "District",
                wardName: "Ward",

                handleEvent: function () {

                    inputSearch.forEach(input => {
                        input.addEventListener('change', (e) => {
                            e.stopPropagation();

                            if (e.target.parentElement.classList.contains('province')) {
                                let idProvince = document.querySelector(
                                    '.province .input_search').value;
                                if (idProvince) {
                                    this.getDistrict(idProvince);
                                }


                            }

                            if (e.target.parentElement.classList.contains('district')) {
                                let idDistrict = document.querySelector(
                                    '.district .input_search').value;
                                if (idDistrict) {
                                    this.getWard(idDistrict);
                                }
                            }
                        })


                        {{--submitOrder.addEventListener('submit', (e) => {--}}
                        {{--    const input = document.querySelector('.ward .input_search');--}}
                        {{--    const loca = document.querySelector('#checkFeeship');--}}
                        {{--    if (loca) {--}}
                        {{--        if (!input.value || !loca.value) {--}}
                        {{--            e.preventDefault();--}}
                        {{--            e.stopImmediatePropagation();--}}
                        {{--            alert(--}}
                        {{--                'Vui lòng nhập địa chỉ đầy đủ hoặc không vận chuyển.');--}}
                        {{--            console.log(false);--}}
                        {{--        } else {--}}
                        {{--            e.preventDefault();--}}
                        {{--            e.stopImmediatePropagation();--}}
                        {{--            --}}{{--let url = "{{ route('invoice.confirm') }}";--}}
                        {{--            let url = "";--}}

                        {{--            (async () => {--}}
                        {{--                const response = await fetch(--}}
                        {{--                    url--}}
                        {{--                );--}}
                        {{--                if (response && response.status === 200) {--}}
                        {{--                    const res = await response.json();--}}
                        {{--                    $.confirm({--}}
                        {{--                        type: 'blue',--}}
                        {{--                        title: 'Xác nhận',--}}
                        {{--                        columnClass: 'col-md-8 col-md-offset-2',--}}
                        {{--                        content: res.invoice,--}}
                        {{--                        buttons: {--}}
                        {{--                            'Huỷ': {--}}
                        {{--                                btnClass: 'btn-red',--}}
                        {{--                                action: function () {--}}

                        {{--                                }--}}
                        {{--                            },--}}
                        {{--                            'Xác nhận': {--}}
                        {{--                                btnClass: 'btn-orange',--}}
                        {{--                                action: function () {--}}
                        {{--                                    console.log($(--}}
                        {{--                                        '.preloader'--}}
                        {{--                                    )--}}
                        {{--                                        .length)--}}
                        {{--                                    if ($(--}}
                        {{--                                        '.preloader')--}}
                        {{--                                        .length) {--}}
                        {{--                                        $('.preloader')--}}
                        {{--                                            .show();--}}
                        {{--                                    }--}}
                        {{--                                    submitOrder--}}
                        {{--                                        .submit();--}}
                        {{--                                }--}}


                        {{--                            },--}}
                        {{--                        }--}}
                        {{--                    });--}}

                        {{--                } else {--}}
                        {{--                    alert('laasy du lieu that bai !!!')--}}
                        {{--                }--}}
                        {{--            })();--}}


                        {{--        }--}}
                        {{--    } else {--}}
                        {{--        e.preventDefault();--}}
                        {{--    }--}}

                        {{--})--}}

                    })


                },


                getProvince: function () {
                    let url = "{{ route('ghn.province') }}";
                    let _this = this;
                    try {
                        $.ajax({
                            type: 'get',
                            url: url,
                            success: function (data) {

                                _this.renderLocationData(data.data.data, app.provinceName);
                            }
                        });

                    } catch (error) {
                        console.error('location error')
                    }

                },
                getDistrict: function (province) {
                    let url = "{{ route('ghn.district', ":idProvince") }}";
                    url = url.replace(':idProvince', province);
                    let _this = this;
                    try {
                        $.ajax({
                            type: 'get',
                            url: url,
                            success: function (data) {

                                _this.renderLocationData(data.data.data, app.districtName);
                            }
                        });

                    } catch (error) {
                        console.error('location error')
                    }
                },

                getWard: function (district) {
                    let url = "{{ route('ghn.ward', ":idDistrict") }}";
                    url = url.replace(':idDistrict', district);
                    let _this = this;
                    try {
                        $.ajax({
                            type: 'get',
                            url: url,
                            success: function (data) {

                                _this.renderLocationData(data.data.data, app.wardName);
                            }
                        });

                    } catch (error) {
                        console.error('location error')
                    }
                },

                renderLocationData: (data, type = '') => {
                    let html = '';
                    let className = type.toLowerCase();

                    if (data) {
                        html+="<option value=''>Bạn chưa chọn</option>";
                        // console.log(data);
                        //convert to search box
                        html += data.map(province => {
                            return (
                                `
                            <option class="search_item" value='${province[`${type}ID`]}'>
                                ${province[`${type}Name`]}
                            </option>
                        `
                            )
                        }).join('')


                    } else {
                        html = `<option>Không tồn tại dữ liệu.</option>`;
                    }
                    let select = document.querySelector(`.input_search.${className} `);
                    select.innerHTML = html
                },
                start: function () {
                    this.handleEvent();
                    this.getProvince();
                }
            }


            app.start();

            function loadCart(data) {
                $(".item-cart").empty();
                $(".item-cart").html(data);
                if ($('#totalQuanty').val()) {
                    $('.cart_counter').text($("#totalQuanty").val());
                } else {
                    $('.cart_counter').text(0);
                }
                if ($('#totalPrice').data('price')) {
                    $('.carsub').text($('#totalPrice').data('price'));
                } else {
                    $('.carsub').text(' 0đ');
                }
            }

            function loadCartItem(data) {
                $("#cart").empty();
                $("#cart").html(data);
                if ($('#totalQuanty1').val()) {
                    $('#priceTotal').text('(' + $("#totalQuanty1").val() + ' Món)');
                } else {
                    $('#priceTotal').text(0);
                }
            }

        }
    </script>

@stop
