@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Nhà cung cấp</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách nhà cung cấp</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ $dataTable->table() }}--}}
                        @livewire('employee-table')
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')

<x-change-status :url="route('admin.users.change-status')" type="select">

</x-change-status>
@endpush
