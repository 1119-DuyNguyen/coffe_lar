@extends('admin.layouts.master')
@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Quản lý tài khoản</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Khởi tạo tài khoản</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.user.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="">
                        </div>

                        <div class="form-group">
                            <label>Di động</label>
                            <input type="text" class="form-control" name="phone" value="">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label>Địa chỉ</label>--}}
{{--                            <input type="text" class="form-control" name="address" value="">--}}
{{--                        </div>--}}

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRole">Vai trò</label>

                            <select id="inputRole" class="form-control" name="role">
                            @foreach($roleList as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Khởi tạo</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
