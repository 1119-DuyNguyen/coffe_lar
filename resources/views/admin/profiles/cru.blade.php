@extends('admin.layouts.master')

@section('content')
    <x-cru-resource
        title="Quản lý nhân viên"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
        :have-index-page="false"

    ></x-cru-resource>
@endsection
