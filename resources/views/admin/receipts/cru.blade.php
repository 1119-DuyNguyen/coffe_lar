@extends('admin.layouts.master')

@section('content')
    <x-cru-resource
        title="nhà cung cấp"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
    ></x-cru-resource>

@endsection
