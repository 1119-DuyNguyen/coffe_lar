@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Tài khoản</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Danh sách tài khoản</h4>
                  </div>
                  <div class="card-body">
{{--                    {{ $dataTable->table() }}--}}
                      @livewire('user-table')
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

@push('scripts')

    <x-change-status :url="route('admin.user.change-status')">

    </x-change-status>
@endpush
