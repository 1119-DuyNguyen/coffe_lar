@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Chấm công"
        table="checkin-table"
        route="admin.checkins.create"
    >
        <x-slot:header>
            <form action="{{ route("admin.employees.salary")}}" method="get" target="_blank">
                <div class="form-group">
                    <label
                        class="lowercase-and-capitalize-first-letter">In bảng lương theo tháng</label>
                </div>
                <input type="month" class="form-control" name="month" required/>
                <div class="w-100 text-right pt-4">

                    <button type="submit" class="btn btn-warning">In <i class="fas fa-print"></i></button>

                </div>
            </form>

            </x-slot>

    </x-index-datatable>
@endsection

