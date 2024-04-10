@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">


            <div class="card">

                <form method="post" class="needs-validation" novalidate=""
                      action="{{route('admin.password.update')}}" enctype="multipart/form-data">
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
                                <label>Xác nhận mật khẩu mới</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                        </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Lưu lại</button>
                    </div>
                </form>
            </div>

        </div>
    </section>

@endsection


