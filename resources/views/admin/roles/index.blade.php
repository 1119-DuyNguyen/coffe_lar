@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Chức vụ"
        table="role-table"
        route="admin.roles.create"
    ></x-index-datatable>

@endsection


