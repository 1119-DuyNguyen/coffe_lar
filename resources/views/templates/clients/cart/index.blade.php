@extends('templates.clients.frontend')
@section('content')
    @if (\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif


    <!-- <div class="breadcrumbs_wrap gray">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-center">
                        <h2 class="breadcrumbs_title">Thanh toán</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    <!-- =========================== Breadcrumbs =================================== -->

    <!-- =========================== Billing Section =================================== -->
    <section>
        <div class="container">
            <form action="{{ route('post.checkout') }}" method="POST" class="submitOrder">
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
                                        value="{{ get_user('customer', 'ten') ?? '' }}" type="text" placeholder="Họ tên"
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
                                    <textarea class="form-control form-control-sm mb-9 mb-md-0 font-size-xs" name="note" id="checkoutBillingCountry"
                                        rows="5" placeholder="Ghi chú"></textarea>
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

                            <div class="col-12">
                                <div class="search_location">
                                    <div class="location_group province">
                                        <input type="text" value="" hidden name="province" />
                                        <input type="text" value="" placeholder="Thành Phố / Tỉnh"
                                            class="input_search" />
                                        <ul class="search_list">

                                        </ul>
                                    </div>

                                    <div class="location_group district">
                                        <input type="text" value="" hidden name="district" />
                                        <input type="text" value="" placeholder="Quận / Huyện"
                                            class="input_search" />
                                        <ul class="search_list">

                                        </ul>
                                    </div>

                                    <div class="location_group ward">
                                        <input type="text" value="" hidden name="ward" />
                                        <input type="text" value="" placeholder="Phường / Xã"
                                            class="input_search" />
                                        <ul class="search_list">

                                        </ul>
                                    </div>

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
                                            alt="..."> Tiền mặt
                                </div>
                            </div>

                            <div class="list-group-item">
                                <!-- Radio -->
                                <div class="custom-control custom-radio">
                                    <!-- Input -->
                                    <input class="custom-control-input" id="checkoutPaymentPaypal" name="payment"
                                        value="1" type="radio">
                                    <!-- Label -->
                                    <label class="custom-control-label font-size-sm text-body text-nowrap"
                                        for="checkoutPaymentPaypal"><img
                                            src="{{ asset('frontend/assets/img/paypal.png') }}" alt="...">
                                        Paypal</label>
                                </div>
                            </div>

                            <div class="list-group-item">
                                <!-- Radio -->
                                <div class="custom-control custom-radio">
                                    <!-- Input -->
                                    <input class="custom-control-input" id="momo" name="payment" value="2"
                                        type="radio">
                                    <!-- Label -->
                                    <label class="custom-control-label font-size-sm text-body text-nowrap"
                                        for="momo"><img src="{{ asset('frontend/assets/img/momo.png') }}"
                                            alt="..."> Momo</label>
                                </div>
                            </div>

                            <div class="list-group-item">
                                <!-- Radio -->
                                <div class="custom-control custom-radio">
                                    <!-- Input -->
                                    <input class="custom-control-input" id="vnpay" name="payment" value="3"
                                        type="radio">
                                    <!-- Label -->
                                    <label class="custom-control-label font-size-sm text-body text-nowrap"
                                        for="vnpay"><img src="{{ asset('frontend/assets/img/vnpay.png') }}"
                                            alt="..."> Vnpay</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">

                        <h4 class="cart_heading">Các món đã chọn</h4>
                        <a href="{{ route('product') }}" class="btn-add">THÊM MÓN</a href="{{ route('product') }}">
                        <div class="right-ch-sideBar item-cart" id="cart">
                            @if (Session::has('cart') != null && Session::get('cart')->products)

                                <div class="cart_select_items">
                                    @foreach (Session::get('cart')->products as $key => $value)
                                        <div class="cart_selected_single">
                                            <div class="cart_selected_single_thumb">
                                                <a href="#"><img
                                                        src="{{ asset('uploads/product') . '/' . $value['productInfo']->hinhanh }}"
                                                        class="img-fluid" alt="" /></a>
                                            </div>
                                            <div class="cart_selected_single_caption">
                                                <a href="javascript:" id="upCart" data-key="{{ $key }}">
                                                    <h4 class="product_title">{{ $value['productInfo']->tensp }}</h4>
                                                </a>
                                                <span class="numberof_item">Số lượng : {{ $value['quanty'] }}</span>
                                                <span class="sizeof_item">Size : {{ $value['size']->size_name }} -
                                                    {{ currency_format($value['productInfo']->giaban + $value['size']->price) }}</span>
                                                <a href="#" class="text-danger btn-cart-del" id="delItemCart"
                                                    data-id="{{ $key }}">Xoá</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="cart_subtotal priceTotal">
                                    <h6>Tổng đơn hàng<span
                                            class="theme-cl carsub">{{ currency_format(Session::get('cart')->totalPrice, 'đ') }}</span>
                                    </h6>
                                    <?php
                                    $feeship = 0;
                                    if (Session::has('feeship') != null) {
                                        $feeship = Session::get('feeship')->feeship !== null ? Session::get('feeship')->feeship : 0;
                                    }
                                    ?>

                                    @if (Session::has('coupon') != null)
                                        <h6>Mã Giảm Giá<span class="theme-cl"> -
                                                @if (Session::get('coupon')->loaigiam === 1)
                                                    {{ currency_format(Session::get('coupon')->giamgia, '%') }}
                                                @endif
                                                @if (Session::get('coupon')->loaigiam === 2)
                                                    {{ currency_format(Session::get('coupon')->giamgia, 'đ') }}
                                                @endif
                                            </span></h6>
                                    @endif
                                    @if (Session::has('coupon') != null)
                                        <h6>Tổng tiền<span class="theme-cl">
                                                @if (Session::has('cart') != null && Session::get('cart')->products)

                                                    <!-- nếu giảm % -->
                                                    @if (Session::get('coupon')->loaigiam === 1)
                                                        {{ currency_format(Session::get('cart')->totalPrice - (Session::get('cart')->totalPrice * Session::get('coupon')->giamgia) / 100 - $feeship, 'đ') }}
                                                    @endif
                                                    <!-- nếu giảm tiền -->
                                                    @if (Session::get('coupon')->loaigiam === 2)
                                                        {{ currency_format(Session::get('cart')->totalPrice - Session::get('coupon')->giamgia - $feeship, 'đ') }}
                                                    @endif
                                                @endif
                                            </span></h6>
                                    @else
                                        @if (Session::has('feeship'))
                                            <h6>Phí vận chuyển<span class="theme-cl"> +
                                                    {{ $feeship !== 0 ? currency_format($feeship) : 'Không hỗ trợ vận chuyển.' }}
                                                </span></h6>
                                        @endif
                                        <h6>Tổng tiền<span class="theme-cl">
                                                @if (Session::has('cart') != null && Session::get('cart')->products)
                                                    {{ currency_format(Session::get('cart')->totalPrice + $feeship, 'đ') }}
                                                @endif
                                            </span></h6>
                                    @endif

                                    <input id="totalPrice" hidden type="number"
                                        data-price="{{ currency_format(Session::get('cart')->totalPrice, 'đ') }}"
                                        value="">
                                    <input id="totalQuanty" hidden type="number"
                                        value="{{ Session::get('cart')->totalQuanty }}">
                                </div>
                            @endif


                        </div>
                        <div class="cart_coupon ">
                            <div class="coupon_header {{ Session::has('coupon') ? 'show' : '' }}">
                                <span class="heading">Mã Giảm Giá</span>
                                <span class="coupon_sale">
                                    @if (Session::has('coupon') != null)
                                        {{ Session::get('coupon')->ten }}
                                    @endif
                                </span>
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="cart_action">
                            <ul>
                                <li><button type="submit" class="btn btn-checkout">Thanh toán</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>


    <!-- =========================== Billing Section =================================== -->

    <!-- ============================ Call To Action ================================== -->


    <script>
        window.onload = () => {
            const divCoupon = document.querySelector('.coupon_header');
            const divCouponText = document.querySelector('.coupon_header .coupon_sale');
            const modalCoupon = document.querySelector('.modal_coupon');
            const closeCoupon = document.querySelector('.coupon_close');
            const bodyCoupon = document.querySelector('.coupon_body');
            const blockCoupon = document.querySelector('.modal_coupon .coupon__list');
            const submitOrder = document.querySelector('.submitOrder');

            const inputSearch = document.querySelectorAll('.search_location .input_search');
            const listSearch = document.querySelector('.search_location .search_list');
            const getCodeCoupon = document.querySelector('.get-coupon');

            const app = {

                dataCoupon: [],
                dataLocation: [],

                handleEvent: function() {
                    divCoupon.addEventListener('click', (e) => {
                        modalCoupon.classList.add('show');
                    })

                    closeCoupon.addEventListener('click', () => {
                        modalCoupon.classList.remove('show');
                    })

                    modalCoupon.addEventListener('click', () => {
                        modalCoupon.classList.remove('show');
                    })

                    bodyCoupon.addEventListener('click', (e) => {
                        e.stopPropagation();
                    })


                    inputSearch.forEach(input => {
                        input.addEventListener('click', (e) => {
                            e.stopPropagation();
                            if (e.target.parentElement.classList.contains('district')) {
                                let idProvince = document.querySelector(
                                    '.province .input_search').dataset.id;
                                if (idProvince) {
                                    this.getDistrict(idProvince, e.target.nextElementSibling);
                                }


                            }

                            if (e.target.parentElement.classList.contains('ward')) {
                                let idDistrict = document.querySelector(
                                    '.district .input_search').dataset.id;
                                if (idDistrict) {
                                    this.getWard(idDistrict, e.target.nextElementSibling);
                                }


                            }
                            input.nextElementSibling.classList.toggle('showSearch');
                        })

                        let listSearch = input.nextElementSibling;
                        listSearch.addEventListener('click', (e) => {
                            e.stopPropagation();
                        });

                        submitOrder.addEventListener('submit', (e) => {
                            const input = document.querySelector('.ward .input_search');
                            const loca = document.querySelector('#checkFeeship');
                            if (loca) {
                                if (!input.value || !loca.value) {
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                    alert(
                                    'Vui lòng nhập địa chỉ đầy đủ hoặc không vận chuyển.');
                                    console.log(false);
                                } else {
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                    let url = "{{ route('invoice.confirm') }}";
                                    (async () => {
                                        const response = await fetch(
                                            url
                                        );
                                        if (response && response.status === 200) {
                                            const res = await response.json();
                                            $.confirm({
                                                type: 'blue',
                                                title: 'Xác nhận',
                                                columnClass: 'col-md-8 col-md-offset-2',
                                                content: res.invoice,
                                                buttons: {
                                                    'Huỷ': {
                                                        btnClass: 'btn-red',
                                                        action: function() {

                                                        }
                                                    },
                                                    'Xác nhận': {
                                                        btnClass: 'btn-orange',
                                                        action: function() {
                                                            console.log($(
                                                                    '.preloader'
                                                                )
                                                                .length)
                                                            if ($(
                                                                    '.preloader')
                                                                .length) {
                                                                $('.preloader')
                                                                    .show();
                                                            }
                                                            submitOrder
                                                                .submit();
                                                        }


                                                    },
                                                }
                                            });

                                        } else {
                                            alert('laasy du lieu that bai !!!')
                                        }
                                    })();


                                }
                            } else {
                                e.preventDefault();
                            }

                        })

                    })

                    inputSearch.forEach(input => {

                        input.addEventListener('input', (e) => {
                            let keyword = e.target.value;

                            if (e.target.parentElement.classList.contains('province')) {
                                let filter = this.dataLocation.province.filter(province => {
                                    return province.province_name.toLowerCase()
                                        .includes(
                                            keyword);
                                })
                                this.renderProvince(filter, 'province');

                            }

                            if (e.target.parentElement.classList.contains('district')) {
                                let filter = this.dataLocation.district.filter(district => {
                                    return district.district_name.toLowerCase()
                                        .includes(
                                            keyword);
                                })
                                this.renderProvince(filter, 'district', e.target
                                    .nextElementSibling);
                            }

                            if (e.target.parentElement.classList.contains('ward')) {
                                let filter = this.dataLocation.ward.filter(ward => {
                                    return ward.ward_name.toLowerCase().includes(
                                        keyword);
                                })

                                this.renderProvince(filter, 'ward', e.target
                                    .nextElementSibling);

                            }



                        })

                    })

                    document.addEventListener('click', () => {

                        const blockSearch = document.querySelectorAll('.search_location .search_list');
                        if (blockSearch) {
                            blockSearch.forEach(search => {
                                if (search.classList.contains('showSearch')) {
                                    search.classList.remove('showSearch')
                                }
                            })
                        }
                    })

                    getCodeCoupon.addEventListener('click', (e) => {
                        e.preventDefault();
                        let code = document.querySelector('.in_coupon').value;
                        if (code) {
                            this.checkCoupon('', code);
                        }
                    });




                },

                checkCoupon: function(coupon, code) {
                    (async () => {
                        let url = "{{ asset('/checkcoupon') }}";
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                id: coupon,
                                code: code,
                            })
                        });
                        if (response && response.status === 200) {
                            const check = await response.json();
                            if (check) {
                                divCouponText.innerText = check.coupon.ten;
                                divCoupon.classList.add('show');
                                modalCoupon.classList.remove('show');
                                loadCart(check.html);
                                loadCartItem(check.html);
                            }
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    })();
                },
                getCoupon: async function() {

                    let url = "{{ asset('/getcoupon') }}";
                    try {
                        const response = await fetch(url);
                    if (response && response.status === 200) {

                        const coupons = await response.json();
                        this.dataCoupon = coupons;
                        console.log(coupons);
                        this.renderCoupon();
                    } else {
                        alert('laasy du lieu that bai !!!')
                    }
                    } catch (error) {
                        console.error('coupon wrong')
                    }


                },
                renderCoupon: function() {
                    let data = `<h6>Không có mã giảm giá.</h3>`;
                    if (this.dataCoupon) {
                        data = this.dataCoupon.map(coupon => {
                            return (
                                `
                        <li class="coupon__item">
                            <div class="card_coupon">
                                <div class="card_img">
                                    <img src="https://minio.thecoffeehouse.com/image/admin/1644803071_coupon-delivery50pt.jpg"
                                        alt="" class="coupon_img">
                                </div>
                                <div class="card_content">
                                    <div class="card_content_title">
                                        <span>
                                           ${coupon.ten}
                                        </span>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                    <div class="card_content_coupontime">
                                        Hết hạn : ${coupon.ngaykt}
                                    </div>
                                    <a href="" class="card_content_link " data-id=${coupon.id}>
                                        Sử dụng ngay
                                    </a>
                                </div>
                            </div>
                        </li>
                        `
                            )
                        }).join('');
                        blockCoupon.innerHTML = data;
                        const btnCoupon = document.querySelectorAll('.modal_coupon .card_content_link');
                        btnCoupon.forEach(btn => {
                            btn.onclick = (e) => {
                                e.preventDefault();
                                let id = e.target.dataset.id;
                                this.checkCoupon(id)
                            }
                        })

                    } else {
                        blockCoupon.innerHTML = data;
                    }
                },
                getLocation: async function() {
                    let url = "{{ route('get.db.province') }}";
                    try {
                        const response = await fetch(
                            url);
                        if (response && response.status === 200) {
                            const province = await response.json();
                            this.dataLocation['province'] = province.results;
                            this.renderProvince(this.dataLocation.province, 'province');
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    } catch (error) {
                        console.error('location error')
                    }

                },
                getDistrict: function(provine, block) {
                    let url = "{{ asset('/') }}";
                    (async () => {
                        const response = await fetch(
                            `${url}province/district/${provine}`);
                        if (response && response.status === 200) {
                            const district = await response.json();
                            this.dataLocation['district'] = district;
                            this.renderProvince(this.dataLocation.district, 'district', block);
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    })();
                },

                getWard: function(district, block) {
                    let url = "{{ asset('/') }}";
                    (async () => {
                        const response = await fetch(
                            `${url}province/ward/${district}`);
                        if (response && response.status === 200) {
                            const ward = await response.json();
                            this.dataLocation['ward'] = ward;
                            this.renderProvince(this.dataLocation.ward, 'ward', block);
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    })();
                },

                getLocation: async function() {
                    try {
                        let url = "{{ route('get.db.province') }}";
                        const response = await fetch(
                            url);
                        if (response && response.status === 200) {
                            const province = await response.json();
                            this.dataLocation['province'] = province;
                            this.renderProvince(this.dataLocation.province, 'province');
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    } catch (error) {
                        console.error('location wrong')
                    }
                    console.log('1')

                },
                renderProvince: function(data, type, divRender = listSearch) {
                    let html = '';
                    if (data) {
                        html = data.map(province => {
                            return (
                                `
                            <li class="search_item" data-id='${province[`${type}_code`]}'>
                                ${province[`${type}_name`]}
                            </li>
                        `
                            )
                        }).join('');
                        if (html) {
                            divRender.innerHTML = html;
                        } else {
                            divRender.innerHTML = `Dữ liệu không có.`;
                        }
                        const listProvinces = document.querySelectorAll(`.${type} .search_item`);
                        listProvinces.forEach(prov => {
                            prov.onclick = (e) => {
                                e.preventDefault();
                                console.log(this.dataLocation);

                                let id = e.target.dataset.id;
                                let pro = this.dataLocation[`${type}`].find(pro => pro[
                                        `${type}_code`] ===
                                    id);
                                document.querySelector(`.${type} input[name="${type}"]`).value =
                                    pro[
                                        `${type}_code`];
                                document.querySelector(`.${type} .input_search`).value = pro[
                                    `${type}_name`];
                                document.querySelector(`.${type} .input_search`).setAttribute(
                                    'data-id', pro[`${type}_code`])

                                if (type === 'ward') {
                                    (async () => {
                                        let url = "{{ asset('/getprice/') }}";
                                        const response = await fetch(
                                            `${url}/${id}`
                                        );
                                        if (response && response.status === 200) {
                                            const check = await response.json();
                                            if (check) {
                                                loadCart(check);
                                                loadCartItem(check);
                                            }
                                        } else {
                                            alert('laasy du lieu that bai !!!')
                                        }
                                    })();
                                }

                            }
                        })

                    } else {
                        listSearch.innerHTML = `Không tồn tại dữ liệu.`;
                    }
                },
                start: function() {
                    this.handleEvent();
                    this.getCoupon();
                    this.getLocation();
                    console.log(this.getLocation());
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
