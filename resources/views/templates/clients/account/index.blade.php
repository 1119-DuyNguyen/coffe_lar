@extends('templates.clients.frontend')
@section('content')


<!-- =========================== Breadcrumbs =================================== -->


<!-- =========================== Account Settings =================================== -->
@if($user)
<section class="gray">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-3">
                <?php $main ?>
                @include('templates.clients.account.navigation',['main' => $main ?? 'info'])
            </div>

            <div class="col-lg-8 col-md-9">
                <!-- Total Items -->
                <div class="card style-2 tab_info {{$main == 'info' ? 'show' : ''}}">
                    <div class="card-header">
                        <h4 class="mb-0">Tài khoản của bạn</h4>
                    </div>
                    <div class="card-body">
                        <form class="submit-page form-upuser update_user " action="{{ route('update.user') }}">
                            <div class="row">
                                @csrf
                                <div class="col-12 ">
                                    <!-- Email -->
                                    <div class="form-group y_up">
                                        <div class="ver1">
                                            <label>Họ và tên</label>
                                            <div class="label-edit">
                                                {{ $user->ten}}
                                            </div>
                                            <input class="form-control" name="ten" type="text" value="{{$user->ten}}">
                                            <input name="id" hidden value="{{$user->id}}">
                                        </div>

                                    </div>
                                    @error('ten')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>


                                <div class="col-12">
                                    <!-- Email -->
                                    <div class="form-group ">
                                        <div class="ver1">
                                            <label> Email</label>
                                            <div class="label-edit">
                                                {{ $user->email}}
                                            </div>
                                            <input class="form-control" readonly name="email" type="email"
                                                placeholder="Email" value="{{$user->email}}" required="">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 y_up">
                                    <!-- Password -->
                                    <div class="form-group ">
                                        <div class="ver1">
                                            <label>Số điện thoại <b>( vd : 0334202221 )</b></label>
                                            <div class="label-edit">
                                                {{ $user->sodienthoai}}
                                            </div>
                                            <div class="sendsms">
                                                <div class="sendsms-block">
                                                    <input class="form-control" name="sodienthoai" type="number"
                                                        value="{{$user->sodienthoai}}">
                                                    <div class="codeVerifly hide_hide">
                                                        <span>Mã Xác Nhận (Kiểm tra điện thoại!)</span>
                                                        <input class="inputcode" min='0' size="1" max='9' type="number"
                                                            maxlength="1">
                                                        <input class="inputcode" min='0' size="1" max='9' type="number"
                                                            maxlength="1">
                                                        <input class="inputcode" min='0' size="1" max='9' type="number"
                                                            maxlength="1">
                                                        <input class="inputcode" min='0' size="1" max='9' type="number"
                                                            maxlength="1">
                                                        <input class="inputcode" min='0' size="1" max='9' type="number"
                                                            maxlength="1">
                                                        <input class="inputcode" min='0' size="1" max='9' type="number"
                                                            maxlength="1">
                                                    </div>
                                                    <span class="sms-message">Ma xac thuc sai</span>
                                                    <span class="sms-message-success">Số điện thoại đã xác nhận thành
                                                        công</span>

                                                </div>

                                                <button class="btn-sms" disabled>Gửi mã</button>
                                            </div>
                                            <div id="recaptcha-container"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 y_up">
                                    <!-- Password -->
                                    <div class="form-group ">

                                        <div class="ver1">
                                            <label>Địa chỉ</label>
                                            <div class="label-edit">
                                                {{ $user->diachi}}
                                            </div>
                                            <input class="form-control" name="diachi" type="text"
                                                value="{{$user->diachi}}">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-update-user up_user" type="submit">Cập nhật</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card style-2 tab_info tab_history {{$main == 'history' ? 'show' : ''}}">
                    <div class="card-header">
                        <h4 class="mb-0">Lịch sử mua hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Tổng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Xử lí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($order))
                                    @foreach($order as $value)
                                    <tr style="border-top: none;">
                                        <td scope="row">
                                            {{ $value->madh}}
                                        </td>
                                        <td>{{ $value->hoten}}</td>
                                        <td> {{format_date($value->ngaytao)}}</td>
                                        <td> {{currency_format($value->tongtien)}}</td>
                                        <td>
                                            <div
                                                class="badge badge-{{ $value->getStatus($value->trangthai)['class']}} ">
                                                {{ $value->getStatus($value->trangthai)['name']}}
                                            </div>
                                        </td>
                                        <td><a href="{{ route('get.user.detail')}}" data-id="{{ $value->id}}"
                                                class="btn btn-sm btn-theme btn-user-detailorder">Xem</a></td>

                                    </tr>
                                    @if(+$value->trangthai === 4)
                                    <tr style="border-bottom: 1px solid #e8eaf1">
                                        <td colspan="6">
                                            <a class="btn btn-warning"
                                                href="{{ route('confirm.order', $value->id)}}">Xác
                                                nhận đã
                                                nhận hàng</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(+$value->trangthai === 5)
                                    <tr style="border-bottom: 1px solid #e8eaf1">
                                        <td colspan="6">
                                            <button class="btn btn-success" disabled>Đã nhận hàng</button>
                                        </td>
                                    </tr>
                                    @endif

                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card style-2 tab_info tab_whishlist {{$main == 'wishlist' ? 'show' : ''}}">
                    <div class="card-header">
                        <h4 class="mb-0">Yêu thích</h4>
                    </div>
                    <div class="row mgt-15">
                        @if(isset($wishlist))
                        @foreach($wishlist as $val)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="item">
                                <div class="woo_product_grid">
                                    <a href="{{ route('del.user.wishlist', $val->id)}}" class="woo_offer_sell"><i
                                            class="fa fa-ban" aria-hidden="true"></i> Xoá</a>
                                    <div class="woo_product_thumb">
                                        <img src="{{ asset('uploads/product/'.$val->hinhanh)}}" class="img-fluid"
                                            alt="" />
                                    </div>
                                    <div class="woo_product_caption center">
                                        <div class="woo_title">
                                            <h4 class="woo_pro_title"><a
                                                    href="{{route('detail', $val->slug)}}">{{$val->tensp}}</a></h4>
                                        </div>
                                        <div class="woo_price ">
                                            <h6>{{currency_format($val->giaban)}}<span class="less_price"></span></h6>
                                            <a href="javascript:" class="btn-plus quickView" data-id="{{$val->id}}"><i
                                                    class="fas fa-shopping-basket"></i></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                </div>



            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="viewuserDetail" tabindex="-1" role="dialog" aria-labelledby="add-payment"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="view-detail">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
            <div class="modal-body">
                <div class="row align-items-center data-user-detail">

                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.6.11/firebase-app.js";
import {
    getAnalytics
} from "https://www.gstatic.com/firebasejs/9.6.11/firebase-analytics.js";

// const firebaseConfig = {
//     apiKey: "AIzaSyC7ALeRiWvTv2KjrMR5UAh7sJRlwaDEf7g",
//     authDomain: "orderdrinks.firebaseapp.com",
//     projectId: "orderdrinks",
//     storageBucket: "orderdrinks.appspot.com",
//     messagingSenderId: "872153443222",
//     appId: "1:872153443222:web:ba0f4cb68374d6786c8bb7",
//     measurementId: "G-9SQ327MWYM"
// };
const firebaseConfig = {
    apiKey: "AIzaSyC_mKMK0o8d-FvKmPvC_LnKuyFlll7LDo8",
    authDomain: "orderdrinkscoffee.firebaseapp.com",
    projectId: "orderdrinkscoffee",
    storageBucket: "orderdrinkscoffee.appspot.com",
    messagingSenderId: "215031192883",
    appId: "1:215031192883:web:5c207cf865f35d7d2d3246",
    measurementId: "G-LPPVYPR11G"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
firebase.initializeApp(firebaseConfig);

const inputSms = document.querySelector('.form-group input[name="sodienthoai"]');
const btnSms = document.querySelector('.btn-sms');
const inputs = document.querySelectorAll('.codeVerifly .inputcode');
const inputCode = document.querySelector('.codeVerifly');
const captcha = document.querySelector('#recaptcha-container');
const divSendSms = document.querySelector('.sendsms');
const sms = {
    isSuccess: false,
    isSend: false,

    handleEvent: function() {
        inputSms.addEventListener('input', (e) => {
            if (e.target.value) {
                btnSms.disabled = false;
            } else {
                btnSms.disabled = true;
            }
        });

        inputSms.addEventListener('focus', () => {
            let error = divSendSms.classList.contains('error');
            error && divSendSms.classList.remove('error')
        })

        btnSms.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopImmediatePropagation();
            if (this.isSuccess) {

            } else {
                if (this.isSend) {
                    inputCode.classList.remove('hide_hide');
                    const valid = Array.from(inputs).every(input => input.value !== '' && true);
                    if (valid) {
                        const code = Array.from(inputs).reduce((prevValue, input, ) => {
                            return prevValue + input.value;
                        }, '')
                        this.confirmResult(code);
                        let error = divSendSms.classList.contains('error');
                        error && divSendSms.classList.remove('error');

                    } else {
                        divSendSms.querySelector('.sms-message').innerText =
                            "Vui lòng nhập đầy đủ mã xác nhận."
                        divSendSms.classList.add('error');
                    }
                } else {
                    let phoneNumberValue = inputSms.value;
                    const regex = /(0)+([0-9]{9})\b/g;
                    if (regex.test(phoneNumberValue)) {
                        let phoneNumber = phoneNumberValue.replace(0, '+84');
                        this.sendSms(phoneNumber);
                    } else {
                        divSendSms.querySelector('.sms-message').innerText = "Số điện thoại không đúng."
                        divSendSms.classList.add('error');
                    }
                }
            }

        })

        inputs.forEach((input, index) => {
            input.addEventListener('keyup', (e) => {
                const nextInput = inputs[index + 1];
                const prevInput = inputs[index - 1];
                if (e.keyCode === 8) {
                    if (prevInput) {
                        prevInput.focus();
                    }
                }
                if (e.target.value.length === input.maxLength) {
                    if (nextInput) {
                        nextInput.focus();
                    }
                } else {
                    input.value = '';
                }

            })
        })


    },

    setUpFirebase: function() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render().then((widgetId) => {
            window.recaptchaWidgetId = widgetId;
        });

    },

    sendSms: function(phone) {
        const phoneNumber = phone;
        const appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
            .then((confirmationResult) => {
                window.confirmationResult = confirmationResult;
                this.isSend = true;
                inputCode.classList.remove('hide_hide');
                captcha.classList.add('hide_hide');
                inputSms.disabled = true;
                btnSms.innerText = "Xác Nhận";

            }).catch((error) => {
                console.log(error)
            });
    },

    confirmResult: (codeNumber) => {
        confirmationResult.confirm(codeNumber).then((result) => {
            // User signed in successfully.
            let error = divSendSms.classList.contains('error');
            error && divSendSms.classList.remove('error');
            divSendSms.classList.add('success');
            sms.isSuccess = true;
            inputSms.disabled = false;
            inputCode.classList.add('hide_hide');
            btnSms.disabled = true;
            const user = result.user;
            console.log(user)
            // ...
        }).catch((error) => {
            if (error) {
                divSendSms.querySelector('.sms-message').innerText =
                    "Mã xác nhận không đúng."
                divSendSms.classList.add('error');
            }
        });
    },

    start: function() {
        this.handleEvent();
        this.setUpFirebase();
    }
}

sms.start();
</script>
@endif
@stop