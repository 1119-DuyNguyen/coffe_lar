@if($product)
<div class="col-lg-6 col-md-12 col-sm-12">
    <div class="">
        <img src="{{ asset('uploads/product/'.$product->thumb_image)}}" class="img-fluid rounded" alt="">
    </div>
</div>

<div class="col-lg-6 col-md-12 col-sm-12">
    <div class="woo_pr_detail">

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

        <div class="woo_pr_color flex_inline_center mb-3">
            <div class="woo_pr_varient">
                <h6>Size:</h6>
            </div>
            <div class="woo_colors_list pl-3">
{{--                @if(count($product->size) > 1)--}}
{{--                @foreach($product->size as $key => $value)--}}
{{--                <div class="custom-varient custom-size">--}}
{{--                    <input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne{{$value->id}}"--}}
{{--                        value="{{$value->id}}" data-toggle="form-caption" data-target="#sizeCaption"--}}
{{--                        {{($key == 0 ? "checked" : "")}}>--}}
{{--                    <label class="custom-control-label" for="sizeRadioOne{{$value->id}}">{{ $value->size_name}}<span--}}
{{--                            class="price-plus"> +--}}
{{--                            {{currency_format($value->price) ?? '0đ'}}</span></label>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--                @else--}}
{{--                @foreach($product->size as $key => $value)--}}
{{--                <div class="custom-varient custom-size">--}}
{{--                    <input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne{{$value->id}}"--}}
{{--                        value="{{$value->id}}" data-toggle="form-caption" data-target="#sizeCaption"--}}
{{--                        {{($key == 0 ? "checked" : "")}}>--}}
{{--                    <label class="custom-control-label" for="sizeRadioOne{{$value->id}}">{{ $value->size_name}}</label>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--                @endif--}}
            </div>
        </div>



        <div class="woo_btn_action">
            <div class="col-12 col-lg-auto">
                <input type="number" name="addSl" class="form-control mb-2 full-width" value=1 />
            </div>
        </div>

        <div class="woo_btn_action">
            <div class="col-12 col-lg-auto">
                <button type="submit" id="addCart" data-id="{{$product->id}}" class="btn btn-block btn-dark mb-2">Thêm
                    Vào Giỏ <i class="fas fa-shopping-basket ml-2"></i></button>
            </div>
            <div class="col-12 col-lg-auto">
                <a href="{{route('user.wishlist.store', $product->id)}}"
                    class="btn btn-theme btn-block mb-2 btn-wishlist">Yêu Thích <i class="fas fa-heart ml-2"></i></a>
            </div>
        </div>

    </div>
</div>
@endif
