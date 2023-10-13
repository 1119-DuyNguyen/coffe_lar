@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Lựa chọn của biến thế</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Khởi tạo lựa chọn của biến thể</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant-item.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Tên biến thể</label>
                            <input type="text" class="form-control" name="variant_name" value="{{$variant->name}}" readonly>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="product_variant_id" value="{{$variant->id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                        </div>

                        <div class="form-group">
                            <label>Tên lựa chọn</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div class="form-group">
                            <label>Giá <code>(Nhập 0 để lựa chọn này miễn phí)</code></label>
                            <input type="text" class="form-control" name="price" value="">
                        </div>

                        <div class="form-group">
                            <label>Số lượng tối đa</label>
                            <input type="text" class="form-control" name="max_qty" value="">
                        </div>

                        <div class="form-group">
                            <label for="inputState">Trạng thái</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Bật</option>
                              <option value="0">Tắt</option>
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
