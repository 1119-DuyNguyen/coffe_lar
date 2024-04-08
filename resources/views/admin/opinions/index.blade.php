@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Loại Ý Kiến"
        table="opinion-table"
        route="admin.opinions.create"
    ></x-index-datatable>

@endsection

