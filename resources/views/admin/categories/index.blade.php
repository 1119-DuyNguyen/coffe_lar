@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Danh mục"
        table="category-table"
        route="admin.categories.create"
    ></x-index-datatable>
@endsection

