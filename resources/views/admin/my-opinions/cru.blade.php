@extends('admin.layouts.master')

@section('content')
    <x-cru-resource title="ý kiến cá nhân" :route="$routeCRU" :method="$method"
                    :formElements="$formElements"></x-cru-resource>
@endsection
