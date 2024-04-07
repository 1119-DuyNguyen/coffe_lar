@extends('admin.layouts.master')

@section('content')

    <x-index-datatable
        title="Phiếu nhập"
        table="receipt-table"
        route="admin.receipts.create"
    ></x-index-datatable>
    <!-- Main Content -->
    {{--    <section class="section">--}}
    {{--        <div class="section-header">--}}
    {{--            <h1>Phiếu nhập</h1>--}}
    {{--        </div>--}}

    {{--        <div class="section-body">--}}

    {{--            <div class="row">--}}
    {{--                <div class="col-12">--}}
    {{--                    <div class="card">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>Danh sách phiếu nhập</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body">--}}
    {{--                            --}}{{-- {{ $dataTable->table() }}--}}
    {{--                            @livewire('receipt-table')--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section>--}}

@endsection

@push('scripts')

    <x-change-status :url="route('admin.users.change-status')" type="select">

    </x-change-status>

@endpush
