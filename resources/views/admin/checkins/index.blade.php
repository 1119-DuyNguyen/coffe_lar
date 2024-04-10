@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Chấm công"
        table="checkin-table"
        route="admin.checkins.create"
    ></x-index-datatable>
@endsection

