
@extends('templates.clients.frontend')



@section('content')
    <section class="container" style="min-height: 100vh">
        <div class="container">
            <div class="row">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lịch sử đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        @livewire('user-order-table')

                    </div>

                </div>
            </div>
        </div>

    </div>

        </div>
    </section>

@endsection

