@extends('templates.clients.frontend')
@section('content')
@if(count($errors) > 0)
<script>
window.onload = () => {
    toastr.error("Lỗi liên hệ.", '', {
        "closeButton": true,
    });
}
</script>
@endif
@if(session()->has('errorContact'))
<script>
window.onload = () => {
    toastr.error("{{session()->get('errorContact')}}");
}
</script>
@endif
@if(session()->has('successContact'))
<script>
window.onload = () => {
    toastr.success("{{session()->get('successContact')}}");
}
</script>
@endif
<section>
    <div class="container">
        <div class="row">

            <div class=" col-12">
                {!! isset($intro->noidung) ? html_entity_decode($intro->noidung) : ''!!} </div>

        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="single_testi_box">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="single_teams_thumb">
                                <img src="{{ asset('img/banner.jpg')}}" class="img-fluid" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="single_teams_wraps">
                                <div class="single_team_caption">
                                    <div class="review_author_box">
                                        <div class="reviews_caption">
                                            <h4 class="testi2_title">MUA HÀNG DỄ DÀNG</h4>
                                        </div>
                                    </div>
                                    <p class="teams_description">Khách hàng có thể dễ dàng mua hàng của chúng tôi thông
                                        qua website chỉ cần đặt hàng là sẽ có ngay sản phẩm mà mình muốn.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 mt-4">
                <div class="single_testi_box">
                    <div class="row ">
                        <div class="col-lg-7 col-md-7">
                            <div class="single_teams_wraps">
                                <div class="single_team_caption">
                                    <div class="review_author_box">
                                        <div class="reviews_caption">
                                            <h4 class="testi2_title">CHẤT LƯỢNG SẢN PHẨM VÀ DỊCH VU CHU ĐÁO</h4>
                                        </div>
                                    </div>
                                    <p class="teams_description">Luôn luôn hỗ trợ khách hàng nhiệt tình và giải đáp tất
                                        cả các thắc mắc của khách hàng nhanh nhất có thể. Và mang đển cho tất cả khách
                                        hàng những sản phẩm tốt và chất lượng nhất.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="single_teams_thumb">
                                <img src="{{ asset('img/blog.jpg')}}" class="img-fluid" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

            <div class="col-lg-4 col-md-4 ">
                <div class="single_facts">
                    <div class="facts_icon">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="facts_caption">
                        <h4>DỄ DÀNG MUA HÀNG</h4>
                        <p>Khách hàng dễ dàng chọn mua sản phẩm mình thích.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="single_facts">
                    <div class="facts_icon">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="facts_caption">
                        <h4>DỊCH VỤ CHU ĐÁO</h4>
                        <p>Luôn luôn hỗ trợ khách hàng nhanh nhất có thể.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="single_facts last">
                    <div class="facts_icon">
                        <i class="fa fa-coffee" aria-hidden="true"></i>
                    </div>
                    <div class="facts_caption">
                        <h4>CHẤT LƯỢNG SẢN PHẨM TỐT</h4>
                        <p>Mang đển cho khách hàng các sản phẩm tốt nhất hiện tại.</p>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="gray">
    <div class="container">

        <div class="row mb-4">

            <div class="col-lg-4 col-md-4">
                <div class="contact-box">
                    <img src="assets/img/us-marker.png" class="mx-auto" alt="">
                    <h4>Địa chỉ liên hệ</h4>
                    {{ $setting->diachi ?? ""}}<br>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="contact-box">
                    <img src="assets/img/india-marker.png" class="mx-auto" alt="">
                    <h4>Email</h4>
                    {{ $setting->email ?? ""}}<br>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="contact-box">
                    <img src="assets/img/uk-marker.png" class="mx-auto" alt="">
                    <h4>Điện thoại</h4>
                    {{ $setting->dienthoai ?? ""}}<br>
                </div>
            </div>

        </div>

        <div class="row mt-5 align-items-center">

            <div class="col-lg-5 col-md-12 hide-91" style="overflow: hidden;">
                {!! $setting->iframemap ?? "" !!}
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="contact-form">
                    <form action="{{ route('send.contact')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tên</label>
                                <input type="text" name="ten" class="form-control" placeholder="Tên">
                                @if($errors->first('ten'))
                                <span class="error text-danger">{{ $errors->first('ten') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @if($errors->first('email'))
                                <span class="error text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label>Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" placeholder="Tiêu dề">
                            @if($errors->first('tieude'))
                            <span class="error text-danger">{{ $errors->first('tieude') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label>Nội dung</label>
                            <textarea rows="6" style="height: unset;" class="form-control" name="noidung"
                                placeholder="Nội dung"></textarea>
                            @if($errors->first('noidung'))
                            <span class="error text-danger">{{ $errors->first('noidung') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

@stop