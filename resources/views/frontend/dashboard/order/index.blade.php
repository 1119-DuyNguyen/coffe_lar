{{--@extends('frontend.layouts.master')--}}
@extends('templates.clients.frontend')

{{--@section('title')--}}
{{--    {{$settings->site_name}}--}}
{{--@endsection--}}

@section('content')
    <section class="gray h-100">
        <div class="container">
            <div class="row">
        <div class="row mb-4">
            <div class="col-12">
                <div class="form-group">
                    <form action="{{route('user.order.index')}}" method="get">

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

        </div>
    </section>

@endsection

{{--@push('scripts')--}}
{{--    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}

{{--@endpush--}}

{{--@section('content')--}}
{{--  <!--=============================--}}
{{--    DASHBOARD START--}}
{{--  ==============================-->--}}

