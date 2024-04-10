@extends('admin.layouts.master')

@section('content')
    <x-cru-resource
        title="danh mục"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
    ></x-cru-resource>

@endsection
