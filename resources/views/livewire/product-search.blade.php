<div class="row align-items-center">

    <div class="input-search ol-lg-12 col-md-12 col-sm-12">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" class="form-control" id="searchTerm" name="searchTerm"
               placeholder="Tìm tên sản phẩm mà bạn quan tâm" wire:model.lazy="searchTerm">
    </div>
    {{ $products->links() }}

    <div class="row align-items-center list-search col-12">
        @if($products->count()>0)
            @foreach($products as $value)

                <div class="col-lg-4 col-md-4 col-sm-6"  wire:key="item--search--product-{{ $value->id }}">
                    <div class="item">
                        <div class="woo_product_grid">
                            <div class="l-product">
                                <div class="woo_product_thumb">
                                    <img src="{{ asset('uploads/product/'.$value->thumb_image)}}" class="img-fluid" alt="" />
                                </div>
                                <div class="woo_product_caption center">
                                    <div class="woo_title">
                                        <h4 class="woo_pro_title"><a href="{{route('product.show', $value->slug)}}">{{$value->name}}</a></h4>
                                    </div>
                                    <div class="woo_price ">
                                        <h6>{{currency_format($value->price)}}<span class="less_price"></span></h6>
                                        <a href="javascript:" class="btn-plus quickView" data-slug="{{$value->slug}}"><i
                                                class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <div class="col-12" style="text-align: center; margin-top: 15px;">
                <img src="{{ asset('frontend/img/none.svg')}}" alt="Không tìm thấy"><br>
                <p>Rất tiếc, chúng tôi không tìm thấy kết quả phù hợp. Vui lòng thử lại với một từ khóa khác.</p>
            </div>
        @endif

    </div>

</div>
