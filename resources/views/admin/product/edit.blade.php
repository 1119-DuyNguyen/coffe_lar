@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.product.update', $product->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img src="{{asset($product->thumb_image)}}" style="width:200px" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="thumb_image">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                </div>
{{--                                <x-input-child-category :categories="$categories"--}}
{{--                                                        :subCategories="$subCategories"--}}
{{--                                                        :childCategories="$childCategories"--}}
{{--                                                        :product="$product"></x-input-child-category>--}}




                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                                </div>

                                <div class="form-group">
                                    <label>Offer Price</label>
                                    <input type="text" class="form-control" name="offer_price"
                                           value="{{$product->offer_price}}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer Start Date</label>
                                            <input type="text" class="form-control datepicker" name="offer_start_date"
                                                   value="{{$product->offer_start_date}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer End Date</label>
                                            <input type="text" class="form-control datepicker" name="offer_end_date"
                                                   value="{{$product->offer_end_date}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Stock Quantity</label>
                                    <input type="number" min="0" class="form-control" name="qty"
                                           value="{{$product->qty}}">
                                </div>



                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description"
                                              class="form-control">{!! $product->short_description !!}</textarea>
                                </div>


                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea name="long_description"
                                              class="form-control summernote">{!! $product->long_description !!}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{$product->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$product->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submmit" class="btn btn-primary">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

