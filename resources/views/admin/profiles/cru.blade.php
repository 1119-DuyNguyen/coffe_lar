@extends('admin.layouts.master')

@section('content')

    <x-cru-resource
        title="Thông tin cá nhân"
        :route="$routeCRU"
        :method="$method"
        :formElements="$formElements"
        :have-index-page="false"

    >


    </x-cru-resource>
@endsection
