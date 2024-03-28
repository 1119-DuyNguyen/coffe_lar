@extends('admin.layouts.master')

@section('content')
    <x-cru-resource title="Quản lý hợp đồng" :route="$routeCRU" :method="$method" :formElements="$formElements">
    </x-cru-resource>
@endsection
