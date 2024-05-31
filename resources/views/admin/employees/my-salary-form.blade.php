@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="lowercase-and-capitalize-first-letter">In bảng lương theo tháng của bản thân</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route("admin.employees.my-salary")}}" method="get" target="_blank">
                                <div class="form-group">
                                    <label
                                        class="lowercase-and-capitalize-first-letter">Tháng</label>
                                </div>
                                <input type="month" class="form-control" name="month" required/>
                                <div class="w-100 text-right pt-4">

                                    <button type="submit" class="btn btn-warning">In <i class="fas fa-print"></i>
                                    </button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

