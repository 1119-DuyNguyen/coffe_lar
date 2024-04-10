@extends('admin.layouts.master')

@section('content')

    <x-index-datatable
        title="Phiếu nhập"
        table="receipt-table"
        route="admin.receipts.create"
    ></x-index-datatable>

@endsection


