@extends('templates.clients.frontend')
@section('content')
@if(session()->has('changePassSuccess'))
<script>
window.onload = () => {
    toastr.info("{{session()->get('changePassSuccess')}}");
}
</script>
@endif
<div class="breadcrumbs_wrap light">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</div>


<!-- =========================== Login/Signup =================================== -->
<section class="gray">
    <div class="container white" style="width: 50%; margin:0 auto">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="login_signup">
                    <h3 class="login_sec_title">Đổi mật khẩu</h3>
                    <form action=" {{route('post.change.pass')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                @if($errors->first('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                @if($errors->first('password_confirmation'))
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="login_flex">
                                    <div class="login_flex_2">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-md btn-theme">Đổi</button>
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