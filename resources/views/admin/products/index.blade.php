@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Sản phẩm"
        table="product-table"
        route="admin.products.create"
    ></x-index-datatable>

@endsection


