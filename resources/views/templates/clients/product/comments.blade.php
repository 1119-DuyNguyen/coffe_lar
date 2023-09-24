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
                    @if($value->id_sanpham)
                    <a href="{{ route('get.comment',['product', $value->id_sanpham])}}" data-id="{{$value->id}}"
                        class="reply_commment">Trả lời</a>
                    @if($value->id_khachhang ===
                    get_user('customer', 'id'))
                    <a href="{{ route('delete.comment', $value->id)}}" class="reply_commment delete">Xoá</a>
                    @endif

                    @else
                    <a href="{{ route('get.comment',['post', $value->id_baiviet])}}" data-id="{{$value->id}}"
                        class="reply_commment">Trả lời</a>

                    @endif
                    <div class="review-wrapper-body hide form-rep form-rep-{{$value->id}}">
                        <div class="row">

                            <div class="col-sm-12 form-group">
                                <textarea class="form-control height-110 content-{{$value->id}}"
                                    placeholder="Nội dung bình luận..."></textarea>
                            </div>
                            <div class="col-sm-12">
                                @if($value->id_sanpham)
                                <a href="{{ route('get.comment',['product', $value->id_sanpham])}}"
                                    data-id="{{$value->id}}" class="btn btn-primary sendCommentsReply">Gửi</a>
                                @else
                                <a href="{{ route('get.comment',['post', $value->id_baiviet])}}"
                                    data-id="{{$value->id}}" class="btn btn-primary sendCommentsReply">Gửi</a>
                                @endif
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
                                        <div class="col-sm-12">
                                            @if($reply->id_khachhang ===
                                            get_user('customer', 'id'))
                                            <a href="{{ route('delete.comment', $reply->id)}}"
                                                class="reply_commment delete">Xoá</a>
                                            @endif
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
        </div>
    </div>
</li>
@endforeach
@endif