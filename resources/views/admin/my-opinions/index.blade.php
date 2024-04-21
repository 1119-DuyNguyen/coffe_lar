@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Ý kiến cá nhân"
        table="my-opinion-table"
        route="admin.my-opinions.create"
    ></x-index-datatable>

@endsection

