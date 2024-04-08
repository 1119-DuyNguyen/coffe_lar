@extends('admin.layouts.master')

@section('content')

    <x-index-datatable
        title="Phiếu nhập"
        table="receipt-table"
        route="admin.receipts.create"
    ></x-index-datatable>

@endsection

@push('scripts')

    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status>

@endpush
