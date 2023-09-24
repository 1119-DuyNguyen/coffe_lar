@extends('templates.clients.frontend')
@section('content')
<section class="gray">
    <div class="container">

        <div class="row">
            @if(count($promo) > 0)
            @foreach($promo as $value)
            <div class="col-lg-12 col-md-12">
                <article class="post-grid-layout post-promotion">
                    <a href="#" class="post-right">
                        <div class="post-article-header">
                            <img src="{{ asset('uploads/coupon/'.$value->hinhanh) }}" class="img-fluid mx-auto" alt="">
                        </div>
                    </a>
                    <div class="body-promotion post-left">

                        <div class="post-article box-inner">
                            <div class="post-grid-caption-header">
                                <span
                                    class="post-article-cat theme-bg">{{(+$value->dieukien === 1) ? 'Giảm giá cho từng sản phẩm' : 'Giảm giá cho từng dơn hàng'}}</span>
                                <h4 class="entry-title"><a href="#">{{$value->ten}}
                                        <span style="display: block;"> => Giảm
                                            -{{currency_format($value->giamgia, ($value->loaigiam === 2) ? 'đ' : '%')}}
                                        </span>
                                    </a>
                                </h4>
                                <div class="post-short-des mb-2 fs-2">
                                    {{$value->mota}}
                                </div>
                                <div class="post-short-des mb-2 fs-2">
                                    Ngày hết hạn:
                                    <?php
                                    echo date('d/m/Y', strtotime($value->ngaykt))
                                    ?>
                                </div>
                                @if(+$value->dieukien ===1)
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                        <h6>Áp dụng với các sản phẩm sau: </h3>
                                    </div>
                                    @foreach($value->product as $val)
                                    <div class="col-lg-4 col-md-6 l-promo">
                                        <img src="{{ asset('uploads/product/'.$val->hinhanh) }}" class="promo-img">
                                        <div>
                                            <span class="promo-cate">{{$val->Danhmuc->tenloai}}</span>
                                            <span class="promo-prod">{{$val->tensp}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <span>Mã khuyến mãi: </span>
                                <span class="span-coupon">{{ $value->code}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

@stop