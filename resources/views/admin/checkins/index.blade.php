@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Chấm công"
        table="checkin-table"
        route="admin.checkins.create"
    ></x-index-datatable>
@endsection

{{-- @push('scripts')
    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status> --}}
{{-- @endpush --}}
