@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Loại Ý Kiến"
        table="typeopinion-table"
        route="admin.type-opinions.create"
    ></x-index-datatable>
@endsection


