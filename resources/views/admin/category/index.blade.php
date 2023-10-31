@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Chuyên mục</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Danh sách chuyên mục</h4>
{{--                    <div class="card-header-action">--}}
{{--                        <a href="{{route('admin.category.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tạo mới</a>--}}
{{--                    </div>--}}
                  </div>
                  <div class="card-body">
                      @livewire('category-table')
{{--                    {{ $dataTable->table() }}--}}
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

@push('scripts')
{{--    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}
    <x-change-status :url="route('admin.category.change-status')"></x-change-status>

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('body').on('click', '.change-status', function(){--}}
{{--                let isChecked = $(this).is(':checked');--}}
{{--                let id = $(this).data('id');--}}

{{--                $.ajax({--}}
{{--                    url: "{{route('admin.category.change-status')}}",--}}
{{--                    method: 'PUT',--}}
{{--                    data: {--}}
{{--                        status: isChecked,--}}
{{--                        id: id--}}
{{--                    },--}}
{{--                    success: function(data){--}}
{{--                        Swal.fire(--}}
{{--                            'Updated!',--}}
{{--                            data.message,--}}
{{--                            'success'--}}
{{--                        )--}}
{{--                    },--}}
{{--                    error: function(xhr, status, error){--}}
{{--                        console.log(error);--}}
{{--                    }--}}
{{--                })--}}

{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endpush
