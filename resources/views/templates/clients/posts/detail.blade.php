@extends('templates.clients.frontend')
@section('content')
<!-- <div class="breadcrumbs_wrap dark">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="text-center">
								<h2 class="breadcrumbs_title">Single Blog Post Article Style</h2>
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

            <div class="col-lg-8 col-md-12 col-sm-12">
                <article class="blog-news big-detail-wrap">
                    <div class="blog-detail-wrap">

                        <!-- Blog Content -->
                        <div class="full blog-content">
                            <a href="blog-detail.html">
                                <h3>{{$post->tieude}}</h3>
                            </a>
                            <div class="blog-text">
                                {!! html_entity_decode($post->noidung) !!}
                            </div>

                        </div>
                    </div>
                    <div class="social mt-4 d-flex align-items-center mb-4">
                        <div class="item-social">
                            <div class="fb-like" data-href="{{$meta['url']}}" data-width="100px" data-layout="standard"
                                data-action="like" data-size="large" data-share="false"></div>
                        </div>
                        <div class="item-social ml-2">
                            <div class="fb-share-button" data-href="{{$meta['url']}}" data-width=""
                                data-layout=" button_count" data-size="large"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{$meta['url']}}"
                                    class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                        </div>

                    </div>
                </article>
                <div class="review-wrapper">
                    <div class="review-wrapper-header">
                    </div>
                    <div class="review-wrapper-body">
                        <ul class="review-list">
                            @if(isset($comments))
                            @foreach($comments as $value)
                            <li>
                                <div class="reviews-box">
                                    <div class="review-body">
                                        <div class="review-avatar">
                                            <img alt=""
                                                src="{{ $value->customer->avatar ?? 'https://media.istockphoto.com/photos/no-image-available-picture-id531302789?s=612x612' }}"
                                                class="avatar avatar-140 photo">
                                        </div>
                                        <div class="review-content">
                                            <div class="review-info">
                                                <div class="review-comment">
                                                    <div class="review-author">
                                                        {{$value->customer->ten}}
                                                    </div>
                                                </div>
                                                <div class="review-comment-date">
                                                    <div class="review-date">
                                                        <span>{{ toTime($value->ngaybl)}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <p>{{$value->noidung}}</p>
                                            <div class="col-sm-12">

                                                <a href="{{ route('get.comment',['post', $value->id_baiviet])}}"
                                                    data-id="{{$value->id}}" class="reply_commment">Trả lời</a>
                                                <div class="review-wrapper-body hide form-rep form-rep-{{$value->id}}">
                                                    <div class="row">

                                                        <div class="col-sm-12 form-group">
                                                            <textarea
                                                                class="form-control height-110 content-{{$value->id}}"
                                                                placeholder="Nội dung bình luận..."></textarea>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <a href="{{ route('get.comment',['post', $value->id_baiviet])}}"
                                                                data-id="{{$value->id}}"
                                                                class="btn btn-primary sendCommentsReply">Gửi</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <ul class="review-list-{{$value->id}}">
                                                    @if(isset($value->replay))
                                                    @foreach($value->replay as $reply)
                                                    <li>
                                                        <div class="reviews-box">
                                                            <div class="review-body">
                                                                <div class="review-avatar">
                                                                    <img alt=""
                                                                        src="{{ $reply->customer->avatar ?? 'https://media.istockphoto.com/photos/no-image-available-picture-id531302789?s=612x612' }}"
                                                                        class="avatar avatar-140 photo">
                                                                </div>
                                                                <div class="review-content">
                                                                    <div class="review-info">
                                                                        <div class="review-comment">
                                                                            <div class="review-author">
                                                                                {{$reply->customer->ten}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="review-comment-date">
                                                                            <div class="review-date">
                                                                                <span>{{ toTime($reply->ngaybl)}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <p>{{$reply->noidung}}</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="review-wrapper">
                    <div class="review-wrapper-header">
                        <h4>Bình luận</h4>
                    </div>

                    @if(get_user('customer','id'))
                    <div class="review-wrapper-body">
                        <div class="row">

                            <div class="col-sm-12 form-group">
                                <textarea class="form-control height-110 content-commment"
                                    placeholder="Nội dung bình luận..."></textarea>
                            </div>
                            <div class="col-sm-12">
                                <a href="{{ route('get.comment',['post', $post->id])}}"
                                    class="btn btn-primary sendComments">Gửi</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="review-wrapper-body">

                        <div class="row">

                            <span>Đăng nhập để bình luận</span>
                        </div>
                    </div>
                    @endif
                </div>


            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="blog-sidebar">



                    <div class="side-widget">
                        <div class="side-widget-header">
                            <h4><i class="fa fa-bars" aria-hidden="true"></i> Bài viết gần đây</h4>
                        </div>
                        <div class="side-widget-body p-t-10">
                            <div class="side-list">
                                <ul class="side-blog-list">
                                    @if(isset($lated))
                                    @foreach($lated as $value)
                                    <li>
                                        <a href="{{ route('detail.posts', $value->slug)}}">
                                            <div class="blog-list-img">
                                                <img src="{{ asset('uploads/post/'.$value->hinhanh) }}"
                                                    class="img-responsive" alt="">
                                            </div>
                                        </a>
                                        <div class="blog-list-info">
                                            <h5><a href="{{ route('detail.posts', $value->slug)}}"
                                                    title="blog">{{$value->tieude}}</a></h5>
                                            <div class="blog-post-meta">
                                                <span class="updated">{{toTime($value->created_at)}}</span> | <a
                                                    href="#" rel="tag">{{ $value->danhmuc->tendanhmuc}}</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif


                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</section>

@stop