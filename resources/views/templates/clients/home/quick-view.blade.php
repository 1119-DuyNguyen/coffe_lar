@php use App\Enums\VariantOption; @endphp
@if($product)
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="">
            <img src="{{ asset('uploads/product/'.$product->thumb_image)}}" class="img-fluid rounded" alt="">
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
            @foreach ($product->variants as $variant)
                    @if ($variant->status != 0 && count($variant->productVariantItems) > 0)
                <fieldset class="woo_pr_color mb-3" name="variants_items[{{$variant->id}}]{{$variant->type==VariantOption::checkbox ? "[]":""}}">
                        <div class="woo_pr_varient text-nowrap">
                            <h6>{{$variant->name}}:</h6>
                        </div>
                        <div class="woo_colors_list">
                            @switch($variant->type)
                                @case(VariantOption::radio)
                                    @foreach($variant->productVariantItems as $key => $value)
                                        @if ( $value->status != 0)
                                            {{--                                            <option--}}
                                            {{--                                                value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}}--}}
                                            {{--                                                (${{$variantItem->price}})--}}
                                            {{--                                            </option>--}}
                                            <div class="custom-varient custom-size">
                                                <input type="radio" class="custom-control-input"
                                                       name="variants_items[{{$variant->id}}]"
                                                       id="sizeRadioOne{{$value->id}}"
                                                       value="{{$value->id}}" data-toggle="form-caption"
                                                       data-target="#sizeCaption"
                                                    {{($key == 0 ? "checked" : "")}}>
                                                <label class="custom-control-label"
                                                       for="sizeRadioOne{{$value->id}}">{{ $value->name}}<span
                                                        class="price-plus"> +
                                                    {{currency_format($value->price) ?? '0đ'}}</span></label>
                                            </div>
                                        @endif

                                    @endforeach
                                    @break
                                @case(VariantOption::checkbox)
                                    @foreach($variant->productVariantItems as $key => $value)
                                        @if ( $value->status != 0)
                                            <div class="custom-varient custom-size">
                                                <input type="checkbox" class="custom-control-input"
                                                       name="variants_items[{{$variant->id}}][]"
                                                       id="sizeRadioOne{{$value->id}}"
                                                       value="{{$value->id}}" data-toggle="form-caption"
                                                       data-target="#sizeCaption"
                                                    {{($key == 0 ? "checked" : "")}}>
                                                <label class="custom-control-label"
                                                       for="sizeRadioOne{{$value->id}}">{{ $value->name}}<span
                                                        class="price-plus"> +
                                                    {{currency_format($value->price) ?? '0đ'}}</span></label>
                                            </div>
                                        @endif

                                    @endforeach
                                    @break
                            @endswitch

                        </div>
                    </fieldset>
                    @endif

                    {{--                <div class="woo_pr_varient">--}}
                    {{--                    <h6>Size:</h6>--}}
                    {{--                </div>--}}
{{--                    <div class="woo_colors_list pl-3">--}}
{{--                        --}}{{--                @if(count($product->size) > 1)--}}
{{--                        --}}{{--                @foreach($product->size as $key => $value)--}}
{{--                        --}}{{--                <div class="custom-varient custom-size">--}}
{{--                        --}}{{--                    <input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne{{$value->id}}"--}}
{{--                        --}}{{--                        value="{{$value->id}}" data-toggle="form-caption" data-target="#sizeCaption"--}}
{{--                        --}}{{--                        {{($key == 0 ? "checked" : "")}}>--}}
{{--                        --}}{{--                    <label class="custom-control-label" for="sizeRadioOne{{$value->id}}">{{ $value->size_name}}<span--}}
{{--                        --}}{{--                            class="price-plus"> +--}}
{{--                        --}}{{--                            {{currency_format($value->price) ?? '0đ'}}</span></label>--}}
{{--                        --}}{{--                </div>--}}
{{--                        --}}{{--                @endforeach--}}
{{--                        --}}{{--                @else--}}
{{--                        --}}{{--                @foreach($product->size as $key => $value)--}}
{{--                        --}}{{--                <div class="custom-varient custom-size">--}}
{{--                        --}}{{--                    <input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne{{$value->id}}"--}}
{{--                        --}}{{--                        value="{{$value->id}}" data-toggle="form-caption" data-target="#sizeCaption"--}}
{{--                        --}}{{--                        {{($key == 0 ? "checked" : "")}}>--}}
{{--                        --}}{{--                    <label class="custom-control-label" for="sizeRadioOne{{$value->id}}">{{ $value->size_name}}</label>--}}
{{--                        --}}{{--                </div>--}}
{{--                        --}}{{--                @endforeach--}}
{{--                        --}}{{--                @endif--}}
{{--                    </div>--}}

            @endforeach


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
                <div class="col-12 pl-0">
                    <a href="{{route('user.wishlist.store', $product->id)}}"
                       class="btn btn-theme btn-block mb-2 btn-wishlist">Yêu Thích <i class="fas fa-heart ml-2"></i></a>
                </div>
            </div>

        </form>
    </div>

@endif
