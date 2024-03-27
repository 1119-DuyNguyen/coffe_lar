@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Quản lý đơn hàng</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ $dataTable->table() }}--}}
                        @livewire('order-table')
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<x-change-status :url="route('admin.orders.change-payment-status')" selector-btn=".change-payment-status" />

<x-change-status :url="route('admin.orders.change-status')" type="select" />

@endpush