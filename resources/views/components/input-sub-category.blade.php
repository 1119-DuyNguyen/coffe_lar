@props(['categories'])
<div class="form-group">
    <label for="inputState">Category</label>
    <select id="inputState" class="form-control main-category" name="category_id">
        <option value="">Select</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="inputState">Sub Category</label>
    <select id="inputState" class="form-control sub-category" name="sub_category_id">
        <option value="">Select</option>
    </select>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', '.main-category', function (e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.category.index')}}/" + id + "/sub-category",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function (i, item) {
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                })
            })

        })
    </script>
@endpush
