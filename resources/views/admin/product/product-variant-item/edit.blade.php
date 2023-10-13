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
                    <h4>Cập nhật lựa chọn của biến thể</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant-item.update', $variantItem->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="product_variant_id" value="{{$variantItem->product_variant_id}}">
                        </div>
                        <div class="form-group">
                            <label>Tên biến thể</label>
                            <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tên lựa chọn</label>
                            <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                        </div>

                        <div class="form-group">
                            <label>Giá <code>(Nhập 0 để lựa chọn này miễn phí)</code></label>
                            <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                        </div>
                        
                        <div class="form-group">
                          <label>Số lượng tối đa</label>
                          <input type="text" class="form-control" name="max_qty" value="{{$variantItem->max_qty}}">
                      </div>

                        <div class="form-group">
                            <label for="inputState">Trạng thái</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$variantItem->status == 1 ? 'selected' : ''}} value="1">Bật</option>
                              <option {{$variantItem->status == 0 ? 'selected' : ''}} value="0">Tắt</option>
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
