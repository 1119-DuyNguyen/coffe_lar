@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Nhân viên"
        table="employee-table"
        route="admin.employees.create"
    ></x-index-datatable>

@endsection

@push('scripts')

    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status>
@endpush
