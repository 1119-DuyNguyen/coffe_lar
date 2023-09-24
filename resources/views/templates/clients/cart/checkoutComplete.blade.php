@extends('templates.clients.frontend')
@section('content')

<!-- =========================== Breadcrumbs =================================== -->

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12">

                <div class="card py-3 mt-sm-3">
                    <div class="card-body text-center">
                        <h2 class="pb-2">Cảm ơn bạn đã đặt hàng của chúng tôi!</h2>
                        <p class="font-size-sm mb-2">Đơn hàng của bạn đã được đặt và sẽ được xử lý trong thời gian sớm
                            nhất.</p>
                        <p class="font-size-sm mb-2">Đảm bảo bạn ghi lại số đơn đặt hàng của mình, đó là <span
                                class="font-weight-medium">
                                @if(isset($madh))
                                {{$madh}}
                                @endif
                            </span></p>
                        <p class="font-size-sm">Bạn sẽ sớm nhận được email xác nhận đơn đặt hàng của bạn. <u>Bạn có
                                thể:</u></p><a class="btn btn-secondary mt-3 mr-3" href=" {{ route('product')}}">Tiếp
                            tục mua </a>
                        @if(get_user('customer'))
                        <a class="btn btn-primary mt-3" href=" {{ route('get.infouser', 'history')}}"><i
                                class="czi-location"></i>&nbsp;Theo dõi đơn hàng</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@stop