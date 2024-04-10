@extends('admin.layouts.master')

@section('content')
    <x-cru-resource title="ý kiến" :route="$routeCRU" :method="$method" :formElements="$formElements"></x-cru-resource>
@endsection
