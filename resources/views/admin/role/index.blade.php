@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Quản lý vai trò</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Danh sách vai trò</h4>
                  </div>
                  <div class="card-body">
{{--                    {{ $dataTable->table() }}--}}
                      @livewire('role-table')
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

@push('scripts')
{{--    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}
    <x-change-status :url="route('admin.user.change-status')">

    </x-change-status>
@endpush
