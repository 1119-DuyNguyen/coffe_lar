@extends('templates.clients.frontend')
@section('content')
<div class="breadcrumbs_wrap dark">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                    <h2 class="breadcrumbs_title">Login/Register</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">My Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login-register</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- =========================== Breadcrumbs =================================== -->


<!-- =========================== Login/Signup =================================== -->
<section>
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12" style="margin: 0 auto">
                <div class="login_signup">
                    <h3 class="login_sec_title">Sign In</h3>
                    <form>

                        <div class="form-group">
                            <input type="number" max=10 class="form-control" name="phone">
                            <div id="recapcha"></div>
                        </div>
                        <div class="login_flex">
                            <div class="login_flex_2">
                                <div class="form-group mb-0">
                                    <button type="submit" id="sendPhone" class="btn btn-md btn-theme">gửi</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control">
                        </div>

                        <div class="login_flex">
                            <div class="login_flex_2">
                                <div class="form-group mb-0">
                                    <button type="submit" id="verify" class="btn btn-md btn-theme">xác nhận</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

@stop