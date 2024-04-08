@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Loại Ý Kiến"
        table="opinion-table"
        route="admin.opinions.create"
    ></x-index-datatable>
    
@endsection

@push('scripts')
    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status>
@endpush
