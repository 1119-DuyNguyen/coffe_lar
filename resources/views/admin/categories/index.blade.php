@extends('admin.layouts.master')

@section('content')
    <x-index-datatable
        title="Danh mục"
        table="category-table"
        route="admin.categories.create"
    ></x-index-datatable>
@endsection

@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}
    <x-change-status :url="route('admin.categories.change-status')"></x-change-status>

    {{-- <script>
      --}}
    {{--        $(document).ready(function(){--}}
    {{--            $('body').on('click', '.change-status', function(){--}}
    {{--                let isChecked = $(this).is(':checked');--}}
    {{--                let id = $(this).data('id');--}}

    {{--                $.ajax({--}}
    {{--                    url: "{{route('admin.categories.change-status')}}",--}}
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
    {{--
    </script>--}}
@endpush
