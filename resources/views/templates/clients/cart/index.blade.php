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
                                        <input type="hidden" value="" name="province"/>
                                        <input type="text" value="" placeholder="Thành Phố / Tỉnh"
                                               class="input_search"/>
                                        <ul class="search_list">

                                        </ul>
                                    </div>

                                    <div class="location_group district">
                                        <input type="text" value="" hidden name="district"/>
                                        <input type="text" value="" placeholder="Quận / Huyện"
                                               class="input_search"/>
                                        <ul class="search_list">

                                        </ul>
                                    </div>

                                    <div class="location_group ward">
                                        <input type="text" value="" hidden name="ward"/>
                                        <input type="text" value="" placeholder="Phường / Xã"
                                               class="input_search"/>
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
                                                          alt="..."> Tiền mặt</label>
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

            const inputSearch = document.querySelectorAll('.search_location .input_search');
            const listSearch = document.querySelector('.search_location .search_list');


            const app = {

                dataLocation: [],
                provinceName: "Province",
                districtName: "district",
                wardName: "Ward",

                handleEvent: function () {

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
                                    {{--let url = "{{ route('invoice.confirm') }}";--}}
                                    let url = "";

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
                                                        action: function () {

                                                        }
                                                    },
                                                    'Xác nhận': {
                                                        btnClass: 'btn-orange',
                                                        action: function () {
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
                    //search data with input
                    inputSearch.forEach(input => {

                        input.addEventListener('input', (e) => {
                            let keyword = e.target.value;

                            if (e.target.parentElement.classList.contains('province')) {
                                let filter = this.dataLocation.province.filter(province => {
                                    return province[`${app.provinceName}Name`].toLowerCase()
                                        .includes(
                                            keyword.toLowerCase());
                                })
                                this.renderLocationData(filter, 'province');

                            }

                            if (e.target.parentElement.classList.contains('district')) {
                                let filter = this.dataLocation.district.filter(district => {
                                    return district.district_name.toLowerCase()
                                        .includes(
                                            keyword);
                                })
                                this.renderLocationData(filter, 'district', e.target
                                    .nextElementSibling);
                            }

                            if (e.target.parentElement.classList.contains('ward')) {
                                let filter = this.dataLocation.ward.filter(ward => {
                                    return ward.ward_name.toLowerCase().includes(
                                        keyword);
                                })

                                this.renderLocationData(filter, 'ward', e.target
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


                },


                getProvince: function () {
                    let url = "{{ route('ghn.province') }}";
                    let _this = this;
                    try {
                        $.ajax({
                            type: 'get',
                            url: url,
                            success: function (data) {
                                _this.dataLocation[app.provinceName] = data.data.data;

                                _this.renderLocationData(_this.dataLocation[app.provinceName], app.provinceName);
                            }
                        });

                    } catch (error) {
                        console.error('location error')
                    }

                },
                getDistrict: function (province, block) {
                    let url = "{{ asset('/') }}";
                    (async () => {
                        const response = await fetch(
                            `${url}province/district/${province}`);
                        if (response && response.status === 200) {
                            const district = await response.json();
                            this.dataLocation['district'] = district;
                            this.renderLocationData(this.dataLocation.district, 'district', block);
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    })();
                },

                getWard:  (district, block)=> {
                    let url = "{{ asset('/') }}";
                    (async () => {
                        const response = await fetch(
                            `${url}province/ward/${district}`);
                        if (response && response.status === 200) {
                            const ward = await response.json();
                            this.dataLocation['ward'] = ward;
                            this.renderLocationData(this.dataLocation.ward, 'ward', block);
                        } else {
                            alert('laasy du lieu that bai !!!')
                        }
                    })();
                },

                renderLocationData:  (data, type='', divRender = listSearch) =>{
                    let html = '';
                    if (data) {
                        // console.log(data);
                        //convert to search box
                        html = data.map(province => {
                            return (
                                `
                            <li class="search_item" data-id='${province[`${type}ID`]}'>
                                ${province[`${type}Name`]}
                            </li>
                        `
                            )
                        }).join('');
                        if (html) {
                            divRender.innerHTML = html;
                        } else {
                            divRender.innerHTML = `Dữ liệu không có.`;
                        }
                        //
                        const listProvinces = document.querySelectorAll(`.location_group.${type.toLowerCase()} .search_item`);
                        let className=type.toLowerCase();
                        console.log(className);
                        listProvinces.forEach(prov => {
                            prov.onclick = (e) => {
                                e.preventDefault();

                                let id = e.target.dataset.id;
                                let pro = app.dataLocation[`${type}`].find(data => {
                                    return data[`${type}ID`] == id
                                });
                                console.log(`.${className} input[name="${className}"]`, document.querySelector(`.${className} input[name="${className}"]`));
                                //assign value to hidden input
                                document.querySelector(`.${className} input[name="${className}"]`).value = pro[`${type}ID`];
                                //assign value to search input
                                document.querySelector(`.${className} .input_search`).value = pro[`${type}Name`];
                                document.querySelector(`.${className} .input_search`).setAttribute('data-id', pro[`${type}ID`])

                                {{--if (type === 'ward') {--}}
                                {{--    (async () => {--}}
                                {{--        let url = "{{ asset('/getprice/') }}";--}}
                                {{--        const response = await fetch(--}}
                                {{--            `${url}/${id}`--}}
                                {{--        );--}}
                                {{--        if (response && response.status === 200) {--}}
                                {{--            const check = await response.json();--}}
                                {{--            if (check) {--}}
                                {{--                loadCart(check);--}}
                                {{--                loadCartItem(check);--}}
                                {{--            }--}}
                                {{--        } else {--}}
                                {{--            alert('laasy du lieu that bai !!!')--}}
                                {{--        }--}}
                                {{--    })();--}}
                                {{--}--}}

                            }
                        })


                    } else {
                        listSearch.innerHTML = `Không tồn tại dữ liệu.`;
                    }
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
