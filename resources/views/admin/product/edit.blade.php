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
                            <h4>Cập nhật sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.product.update', $product->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Xem trước</label>
                                    <br>
                                    <img src="{{asset($product->thumb_image)}}" style="width:200px" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" name="thumb_image">
                                </div>

                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                </div>
{{--                                <x-input-child-category :categories="$categories"--}}
{{--                                                        :subCategories="$subCategories"--}}
{{--                                                        :childCategories="$childCategories"--}}
{{--                                                        :product="$product"></x-input-child-category>--}}


                                <div class="form-group">
                                    <label for="inputCategory">Danh mục</label>

                                    <select id="inputCategory" class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id==$product->category_id ? 'selected': ""}} >{{$category->name}}</option>
                                    @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label>Khối lượng (g)</label>
                                    <input type="number" class="form-control" name="weight" value="{{$product->weight}}">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description"
                                              class="form-control">{!! $product->description !!}</textarea>
                                </div>


                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="content"
                                              class="form-control summernote">{!! $product->content !!}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="inputState">Trạng thái</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{$product->status == 1 ? 'selected' : ''}} value="1">Bật</option>
                                        <option {{$product->status == 0 ? 'selected' : ''}} value="0">Tắt</option>
                                    </select>
                                </div>
                                <button type="submmit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

