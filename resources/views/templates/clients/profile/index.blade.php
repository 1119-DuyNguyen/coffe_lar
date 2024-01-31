{{--@extends('frontend.layouts.master')--}}
@extends('templates.clients.frontend')

@section('content')
<section class="section container" style="min-height: 100vh;">

    <div class="section-body">

        <div class="row mt-sm-4">

            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <form method="post" class="form-info" action="{{route('admin.profile.update')}}">
                        @csrf
                        <div class="card-header">
                            <h4>Cập nhập thông tin tài khoản</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>Tên người dùng</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">

                                </div>
                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{$user->email}}">

                                </div>
                                <div class="form-group col-12">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">

                    <form method="post" class="form-info" novalidate="" action="{{route('admin.password.update')}}"
                        class="form-info">
                        @csrf
                        <div class="card-header">
                            <h4>Cập nhập mật khẩu</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>

                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    formAjax('.form-info',(data)=>{
            Swal.fire(
                'Cập nhập thành công',
                '',
                'success'
            ).then((result)=>{
                window.location.reload();

            })
        });
        console.log(document.querySelectorAll('.form-info'))
</script>
@endpush
