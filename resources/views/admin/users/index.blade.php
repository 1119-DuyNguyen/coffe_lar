@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Tài khoản"
        table="user-table"
        route="admin.users.create"
    ></x-index-datatable>

@endsection


