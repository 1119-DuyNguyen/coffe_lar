@php use App\Enums\VariantOption; @endphp

@if($product)
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="">
            <img src="{{ asset($product->thumb_image)}}" class="img-fluid w-100 img-thumbnail" alt="ảnh">
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
        <form class="woo_pr_detail" method="POST" action="{{ route("cart.store")}}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="woo_cats_wrps">
                <a href="#" class="woo_pr_cats">{{$product->category->name}}</a>

            </div>
            <h2 class="woo_pr_title">{{$product->name}}</h2>

            <div class="woo_pr_price">
                <div class="woo_pr_offer_price">
                    <h3>{{currency_format($product->price)}}</h3>
                </div>
            </div>

            <div class="woo_pr_short_desc">
                <p>{{$product->description}}</p>
            </div>

            <div class="woo_btn_action d-inline-block">
                <div class="col-12 pl-0">
                    <input type="number" name="qty" min="1" class="form-control mb-2 full-width" value="1"/>
                </div>
            </div>

            <div class="woo_btn_action d-inline-block">
                <div class="col-12 pl-0">
                    <button type="submit" id="addCart" data-id="{{$product->id}}" class="btn btn-block btn-dark mb-2">
                        Thêm
                        Vào Giỏ <i class="fas fa-shopping-basket ml-2"></i></button>
                </div>
{{--                <div class="col-12 pl-0">--}}

{{--                    <a href=""  class="add_to_wishlist" data-id="{{$product->id}}"--}}
{{--                       class="btn btn-theme btn-block mb-2 btn-wishlist">Yêu Thích <i class="fas fa-heart ml-2"></i></a>--}}
{{--                </div>--}}
            </div>

        </form>
    </div>

@endif
