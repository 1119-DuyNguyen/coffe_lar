@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Quản lý vai trò</h1>
          </div>

          <div class="section-body container">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Khởi tạo vai trò</h4>

                  </div>
                  <div class="card-body container">
                    <form action="{{route('admin.role.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" class="form-control" name="description" value="">
                        </div>

                        <div class="form-group container">
                            <label for="inputState">Quyền</label>
                            <div class="row">
                                @foreach($permissionList as $permission)
                                    <div  class="col-12 col-sm-6 col-lg-4 ">
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"> {{$permission->description}}
                                </div>
                                @endforeach

                            </div>

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
