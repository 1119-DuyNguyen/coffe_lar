@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Biến thể sản phẩm</h1>
          </div>
          <div class="mb-3">
            <a href="{{route('admin.product.index')}}" class="btn btn-primary">Quay lại</a>
          </div>
          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sản phẩm: {{$product->name}}</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.product.product-variant.create', ['product' => $product->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tạo mới</a>
                    </div>
                  </div>
                  <div class="card-body">
                    {{ $dataTable->table() }}
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <x-change-status :url="route('admin.product-variant.change-status')"></x-change-status>

@endpush
