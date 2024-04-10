@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Đơn hàng"
        table="order-table"
        route="admin.orders.create"
        :use-create-btn="false"
    ></x-index-datatable>

@endsection

{{--@push('scripts')--}}
{{--    <x-change-status :url="route('admin.orders.change-payment-status')" selector-btn=".change-payment-status"/>--}}

{{--    <x-change-status :url="route('admin.orders.change-status')" type="select"/>--}}

{{--@endpush--}}
