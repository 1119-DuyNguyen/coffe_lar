@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Người mua hàng"
        table="user-table"
        route="admin.users.create"
    ></x-index-datatable>

@endsection


