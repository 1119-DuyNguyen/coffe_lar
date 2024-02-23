@extends('admin.layouts.master')

@section('content')
    <x-cru-resource
        title="chức vụ"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
    ></x-cru-resource>

@endsection
