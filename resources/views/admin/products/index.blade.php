@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Sản phẩm</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách sản phẩm</h4>
                        {{-- <div class="card-header-action">--}}
                            {{-- <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Thêm mới</a>--}}
                            {{-- </div>--}}
                    </div>
                    <div class="card-body">
                        {{-- {{ $dataTable->table() }}--}}
                        @livewire('product-table')
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
{{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}
<x-change-status :url="route('admin.products.change-status')" />

@endpush