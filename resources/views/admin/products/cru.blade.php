@extends('admin.layouts.master')

@section('content')
    <x-cru-resource
        title="sản phẩm"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
    ></x-cru-resource>

@endsection