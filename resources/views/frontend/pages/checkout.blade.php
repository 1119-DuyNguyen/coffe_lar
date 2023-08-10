@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Checkout
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <form action="{{route('user.cod.payment')}}" method="post" id="checkOutForm">
                @csrf
                <div class="row">

                    <div class="col-xl-8 col-lg-7">
                        <div class="dashboard_content mt-2 mt-md-0">
                            <div class="wsus__dashboard_add wsus__add_address">
                                <h3><i class="fal fa-gift-card"></i>address</h3>
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>name <b>*</b></label>
                                            <input type="text" placeholder="Name" name="name" value = "{{old('name') ?? "test"}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>email</label>
                                            <input type="email" placeholder="Email" name="email" value="{{old('email') ?? "testtest@gmail.com"}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>phone <b>*</b></label>
                                            <input type="text" placeholder="Phone" name="phone" value="{{old('phone')??"0123456789"}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>country <b>*</b></label>
                                            <div class="wsus__topbar_select">
                                                <select class="select_2" name="country" required>
                                                    <option>Select</option>
                                                    @foreach (config('settings.country_list') as $country)
                                                        <option value="{{$country}}" {{(old('country') == $country || old('country') != $country && $country=='Vietnam') ?"selected" : ""}} > {{$country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>State <b>*</b></label>
                                            <input type="text" placeholder="State" name="state" value="{{old('state')}}" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>City <b>*</b></label>
                                            <input type="text" placeholder="City" name="city" value="{{old('city')}}" required>
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>zip code <b>*</b></label>
                                            <input type="text" placeholder="Zip Code" name="zip" value="{{old('zip')}}"required>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Address <b>*</b></label>
                                            <input type="text" placeholder="Address" name="address" value="{{old('address')}}" required>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">

                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                                <p>coupon(-): <span>{{$settings->currency_icon}}{{getCartDiscount()}}</span></p>
                                <p><b>total:</b> <span><b id="total_amount"
                                                          data-id="{{getMainCartTotal()}}">{{$settings->currency_icon}}{{getMainCartTotal()}}</b></span>
                                </p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value=""
                                           id="flexCheckChecked3"
                                           checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                            <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">

                            <button class="common_btn" type="submit">Place Order</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>

    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection
