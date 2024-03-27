@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Sản phẩm</h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Khởi tạo sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control" name="thumb_image">
                            </div>

                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            {{-- <x-input-child-category :categories="$categories"></x-input-child-category>--}}

                            <div class="form-group">
                                <label for="inputCategory">Chuyên mục</label>

                                <select id="inputCategory" class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>



                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" name="price" value="{{old('price')}}">
                            </div>
                            <div class="form-group">
                                <label>Khối lượng (g)</label>
                                <input type="number" class="form-control" name="weight" value="{{old('weight')}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả </label>
                                <textarea name="description" class="form-control">
                                {!! old('description')!!}
                            </textarea>
                            </div>


                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="content" class="form-control summernote">
                                {!! old('content')!!}

                            </textarea>
                            </div>



                            <div class="form-group">
                                <label for="inputState">Trạng thái</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option value="1" selected>Bật</option>
                                    <option value="0">Tắt</option>
                                </select>
                            </div>
                            <button type="submmit" class="btn btn-primary">Khởi tạo</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection