@extends('admin.layouts.master')

@section('content')
    {{--    <x-cru-resource--}}

    {{--        title="phiếu nhập hàng"--}}

    {{--        :route="$routeCRU"--}}
    {{--        :method="$method"--}}
    {{--        :formElements="$formElements"--}}
    {{--    ></x-cru-resource>--}}

    @livewire('import-receipt')

@endsection
