@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Hợp đồng"
        table="contract-table"
        route="admin.contracts.create"
    ></x-index-datatable>
@endsection

{{-- @push('scripts')
    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status> --}}
{{-- @endpush --}}
