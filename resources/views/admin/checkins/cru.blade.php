@extends('admin.layouts.master')

@section('content')
    <x-cru-resource title="Chấm công" :route="$routeCRU" :method="$method" :formElements="$formElements">
    </x-cru-resource>
@endsection
