@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Nhân viên"
        table="employee-table"
        route="admin.employees.create"
    ></x-index-datatable>

@endsection

