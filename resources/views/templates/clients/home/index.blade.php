@extends('templates.clients.frontend')

@section('content')

    <section style="padding-bottom: 20px;
  padding-top: 20px;
  width: 100%;
  background:radial-gradient(100% 501.4% at 100% 100%,#ffb141 0%,#fb8d17 100%);
  ">
        <div class="container container-lg position-relative">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner pb-5" style="height: auto">
                    <a href="#" class="carousel-item active">
                        <img class="d-block w-100" src="{{asset("uploads/slide/1683694.jpeg")}}"
                             alt="First slide">
                    </a>
                    <a href="#" class="carousel-item">
                        <img class="d-block w-100" src="{{asset("uploads/slide/1683694.jpeg")}}"
                             alt="Second slide">
                    </a>
                    <a href="#" class="carousel-item">
                        <img class="d-block w-100" src="{{asset("uploads/slide/1683694.jpeg")}}"
                             alt="Third slide">
                    </a>
                </div>
{{--                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
{{--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
{{--                </a>--}}
{{--                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
{{--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Next</span>--}}
{{--                </a>--}}
            </div>

        </div>
    </section>

    <!-- ======================== Banner End ==================== -->



    <section class="pt-0 ">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-heading-flex ">
                        <div class="sec-heading-flex-one">
                            <h2>Sản Phẩm Mới</h2>
                        </div>
                        <!-- <div class="sec-heading-flex-last">
						<a href="{{route('product.index')}}" class="btn btn-theme">Xem thêm<i class="fas fa-arrow-right ml-2"></i></a>
					</div> -->
                    </div>
                </div>
            </div>

            <div class="row">
                @if($productNew)
                    @foreach($productNew as $value)
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <x-product :product="$value"></x-product>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

@stop
