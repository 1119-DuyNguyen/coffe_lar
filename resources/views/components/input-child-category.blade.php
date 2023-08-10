@props(['categories'=>[],'subCategories'=>[],'childCategories'=>[],'product'])
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="inputState">Category</label>
            <select id="inputState" class="form-control main-category" name="category_id">
                <option value="">Select</option>
                @foreach ($categories as $category)
                    <option
                        value="{{$category->id}}" {{( isset($product)&&$category->id == $product->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="inputState">Sub Category</label>
            <select id="inputState" class="form-control sub-category" name="sub_category_id">
                <option value="">Select</option>
                @foreach ($subCategories as $subCategory)
                    <option
                        {{( isset($product)&&$subCategory->id == $product->sub_category_id) ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="inputState">Child Category</label>
            <select id="inputState" class="form-control child-category" name="child_category_id">
                <option value="">Select</option>
                @foreach ($childCategories as $childCategory)
                    <option
                        {{( isset($product)&&$childCategory->id == $product->child_category_id) ? 'selected' : ''}} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
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
            /** get child categories **/
            $('body').on('change', '.sub-category', function (e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.sub-category.index')}}/" + id + "/child-category",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $('.child-category').html('<option value="">Select</option>')

                        $.each(data, function (i, item) {
                            $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
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
