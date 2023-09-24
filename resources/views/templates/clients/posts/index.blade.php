@extends('templates.clients.frontend')
@section('content')
<!-- <div class="breadcrumbs_wrap dark">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                    <h2 class="breadcrumbs_title">Tin tức</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div> -->
<!-- =========================== Breadcrumbs =================================== -->


<!-- =========================== News & Articles =================================== -->
<section class="gray">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="tabs_post">
                    @if($cate)
                    @foreach($cate as $key => $value)
                    <div class="tab-item-post {{$key == 0 ? 'active' : ''}}">
                        <div class="post_title">
                            <a href="javascript:">{{$value->tendanhmuc}}</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="content">
                    @if($cate)
                    @foreach($cate as $key => $value)

                    <div class="tab-pane-post {{$key == 0 ? 'active' : ''}}">
                        <div class="row">
                            @if($posts)
                            @foreach($posts as $val)
                            @if ($val->id_danhmuc == $value->id)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <article class="post-grid-layout">
                                    <a href="blog-detail.html">
                                        <div class="post-article-header">
                                            <img src="{{ asset('uploads/post/'.$val->hinhanh) }}"
                                                class="img-fluid-post mx-auto" alt="">
                                        </div>
                                    </a>
                                    <div class="post-article box-inner">
                                        <div class="post-grid-caption-header">
                                            <span
                                                class="post-article-cat theme-bg">{{ $val->Danhmuc->tendanhmuc}}</span>
                                            <h4 class="entry-title"><a
                                                    href="{{ route('detail.posts', $val->slug)}}">{{$val->tieude}}</a>
                                            </h4>

                                        </div>
                                    </div>
                                    <div class="post-article-footer">
                                        <div class="post-author">
                                            <a href="{{ route('detail.posts', $val->slug)}}"
                                                class="btn offer_box_btn">Đọc tiếp</a>
                                        </div>
                                        <span><i class="fas fa-calendar mr-1"></i>{{toTime($val->created_at)}}</span>
                                    </div>
                                </article>
                            </div>

                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@stop