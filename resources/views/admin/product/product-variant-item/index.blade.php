@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant Items</h1>
          </div>
          <div class="mb-3">
            <a href="{{route('admin.product.product-variant.index', ['product' => $product->id])}}" class="btn btn-primary">Back</a>
          </div>
          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Variant: {{$variant->name}} </h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.product.product-variant.product-variant-item.create', ['product' => $product->id, 'product_variant' => $variant->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
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
    <x-change-status :url="route('admin.product-variant-item.change-status')"></x-change-status>

@endpush
