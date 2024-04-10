@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Hợp đồng"
        table="contract-table"
        route="admin.contracts.create"
    ></x-index-datatable>
@endsection

