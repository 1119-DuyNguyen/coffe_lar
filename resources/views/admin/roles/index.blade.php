@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Chức vụ"
        table="role-table"
        route="admin.roles.create"
    ></x-index-datatable>

@endsection

@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}
    <x-change-status :url="route('admin.users.change-status')">

    </x-change-status>
@endpush
