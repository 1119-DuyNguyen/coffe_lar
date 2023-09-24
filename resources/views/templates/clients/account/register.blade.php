@extends('templates.clients.frontend')
@section('content')
<!-- <div class="breadcrumbs_wrap dark">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                    <h2 class="breadcrumbs_title">Đăng ký</h2>
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
</div> -->
<!-- =========================== Breadcrumbs =================================== -->


<!-- =========================== Login/Signup =================================== -->
<section class="gray">
    <div class="container white" style="width: 50%; margin:0 auto">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="login_signup">
                    <h3 class="login_sec_title">Tạo tài khoản</h3>
                    <form action=" {{route('post.register')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                @if($errors->first('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                @if($errors->first('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                @if($errors->first('password_confirmation'))
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Họ Tên</label>
                                    <input type="text" name="hoten" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" name="diachi" class="form-control">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12">
                                <div class="login_flex">
                                    <div class="login_flex_2">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-md btn-theme">Đăng ký</button>
                                        </div>
                                    </div>
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