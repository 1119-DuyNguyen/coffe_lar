@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant</h1>
          </div>
            <div class="mb-3">
                <a href="{{route('admin.product.product-variant.index', ['product' => $variant->product_id])}}" class="btn btn-primary">Back</a>
            </div>
          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Variant</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant.update', $variant->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control" name="product_id" value="{{$variant->product_id}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$variant->name}}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$variant->status == 1 ? 'selected' : ''}} value="1">Active</option>
                              <option {{$variant->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Update</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
