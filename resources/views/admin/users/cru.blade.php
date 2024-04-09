@extends('admin.layouts.master')

@section('content')
    <x-cru-resource
        title="Người dùng"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
    ></x-cru-resource>
@endsection
