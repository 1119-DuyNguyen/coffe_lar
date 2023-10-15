
@props(['product'])
@if($product)
            <!-- Single Item -->
                <div class="item">
                    {{$slot}}
                    <form class="woo_product_grid" method="POST" action="{{ route("cart.store")}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="qty" value="1">

                        <div class="woo_product_caption center">
                            <div class="woo_title">
                                <h4 class="woo_pro_title"><a href = "" class="quickView" data-slug="{{$product->slug}}"
                                        >
                                        <span  class="woo_product_thumb mb-3">

                                        <img src="{{ asset('uploads/product/'.$product->thumb_image)}}" class="img-fluid" alt="" />
                                        </span>

                                        {{$product->name}}</a></h4>
                            </div>
                            <div class="woo_price ">
                                <h6>

                                        {{currency_format($product->price)}}

                                </h6>
                                <a href="javascript:" class="btn-plus add-cart" ><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </form>
                </div>
@endif
