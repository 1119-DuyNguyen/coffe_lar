@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Biến thể sản phẩm</h1>
          </div>
            <div class="mb-3">
                <a href="{{route('admin.product.product-variant.index', ['product' => $variant->product_id])}}" class="btn btn-primary">Back</a>
            </div>
          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Cập nhật biến thể</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant.update', $variant->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control" name="product_id" value="{{$variant->product_id}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" value="{{$variant->name}}">
                        </div>

                        <div class="form-group">
                            <label for="inputType">Loại</label>
                            <select id="inputType" class="form-control" name="type">
                              <option {{$variant->type == 0 ? 'selected' : ''}} value="0">Chọn một</option>
                              <option {{$variant->type == 1 ? 'selected' : ''}} value="1">Chọn nhiều</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputMustHave">Bắt buộc</label>
                            <select id="inputMustHave" class="form-control" name="must_have">
                                <option {{$variant->must_have == 1 ? 'selected' : ''}} value="1">Có</option>
                                <option {{$variant->must_have == 0 ? 'selected' : ''}} value="0">Không</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Trạng thái</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$variant->status == 1 ? 'selected' : ''}} value="1">Bật</option>
                              <option {{$variant->status == 0 ? 'selected' : ''}} value="0">Tắt</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Cập nhật</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
