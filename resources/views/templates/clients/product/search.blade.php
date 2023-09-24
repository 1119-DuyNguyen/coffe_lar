<div class="col-12">

@if(isset($products) && !$products->isEmpty())
    @foreach($products as $value)

<div class="col-lg-4 col-md-4 col-sm-6">
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
{!! $products->links() !!}

@else
<div class="col-12" style="text-align: center; margin-top: 15px;">
    <img src="{{ asset('frontend/img/none.svg')}}" alt="Không tìm thấy"><br>
    <p>Rất tiếc, chúng tôi không tìm thấy kết quả phù hợp. Vui lòng thử lại với một từ khóa khác.</p>
</div>
@endif
</div>
