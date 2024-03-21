@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Phiếu nhập</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nhập sản phẩm vào kho</h4>

                        </div>
                        <div class="card-body">
                            @livewire('import-receipt')

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
