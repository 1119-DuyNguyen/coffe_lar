@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Orders</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <form action="{{route('admin.order.index')}}" method="get">
                            <label>Order status</label>

                            <select class="form-control" name="status" onchange="this.closest('form').submit();">
                                <option value=""> All</option>
                                @foreach ( $statusOrder as $key => $status)
                                    <option
                                         value="{{$key}}"
                                         @if(!empty(request()->input('status'))&& request()->input('status') == $key)
                                           selected
                                        @endif
                                    >{{$status['status']}}</option>
                                @endforeach

                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Order</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
