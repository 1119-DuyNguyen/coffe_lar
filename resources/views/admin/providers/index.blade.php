@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Nhà cung cấp"
        table="provider-table"
        route="admin.providers.create"
    ></x-index-datatable>

@endsection

@push('scripts')

    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status>
@endpush
