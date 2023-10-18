<footer class="dark-footer skin-dark-footer style-2">
    <div class="before-footer">
        <div class="container">

        </div>
    </div>

    <div class="footer-middle">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="footer_widget">
                        <h4 class="extream">Liên hệ</h4>
                        <!-- <p>Liên hệ ngay !!!<a href="#" class="theme-cl">Nếu bạn cần hõ trợ</a></p> -->

                        <div class="address_infos">
                            <ul>
{{--                                <li><i class="fas fa-map-marker-alt"></i>{{ $setting->diachi ?? ""}}<br></li>--}}
{{--                                <li><i class="fas fa-phone-square"></i>{{ $setting->dienthoai ?? ""}}</li>--}}
                                <li><i class="fas fa-envelope"></i>{{ $setting->email ?? ""}}</li>
                            </ul>
                        </div>

                        <div class="address_infos">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>HCM<br></li>
                                <li><i class="fas fa-phone-square"></i>1234567890</li>
                                <li><i class="fas fa-envelope"></i>admin</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- <div class="col-lg-2 col-md-2">
					<div class="footer_widget">
						<h4 class="widget_title">Categories</h4>
						<ul class="footer-menu">
							<li><a href="#">Organic</a></li>
							<li><a href="#">Grocery</a></li>
							<li><a href="#">Education</a></li>
							<li><a href="#">Furniture</a></li>
						</ul>
					</div>
				</div> -->
                <div class="col-lg-2 col-md-2">
                    <div class="footer_widget">
                        <h4 class="widget_title">Giới thiệu</h4>
                        <ul class="footer-menu">
                            {{--                            <li><a href="{{ route('about')}}">Về Chúng Tôi</a></li>--}}
                            <li><a href="{{ route('product.index')}}">Sản phẩm</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2">
{{--                    <div class="footer_widget">--}}
{{--                        <h4 class="widget_title">Điều khoản</h4>--}}
{{--                        <ul class="footer-menu">--}}
{{--                            @if(isset($policy) && count($policy) > 0)--}}
{{--                            @foreach($policy as $value)--}}
{{--                            <li><a href="{{ route('show.policy', $value->slug)}}">{{$value->tieude}}</a></li>--}}
{{--                            @endforeach--}}
{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>



                <div class="col-lg-3 col-md-2">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDrink-Coffee-109823691782418&tabs=timeline&width=340&height=187&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1056375581823890"
                        width="340" height="" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>


            </div>
        </div>
    </div>

    <!-- <div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-6 col-md-8">
					<p class="mb-0">©Copyright 2020 Odex. Designd By <a href="https://bootstrapdesigns.net">BootstrapDesigns</a>.</p>
				</div>

				<div class="col-lg-6 col-md-6 text-right">
					<ul class="footer_social_links">
						<li><a href="#"><i class="ti-facebook"></i></a></li>
						<li><a href="#"><i class="ti-twitter"></i></a></li>
						<li><a href="#"><i class="ti-instagram"></i></a></li>
						<li><a href="#"><i class="ti-linkedin"></i></a></li>
					</ul>
				</div>

			</div>
		</div>
	</div> -->
</footer>
<!-- ============================ Footer End ================================== -->

<!-- cart -->
<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
    <div class="rightMenu-scroll">
        <h4 class="cart_heading">Các món đã chọn</h4>
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i class="fas fa-times"></i></button>
        <div class="right-ch-sideBar item-cart isCart" id="cart-sidebar">
            @include('templates.clients.home.cart')

        </div>
        <div class="cart_action">
            <ul>
                <li><a href="{{ route('cart.index')}}" class="btn btn-go-cart btn-theme">Đến giỏ hàng</a></li>
            </ul>
        </div>

    </div>
</div>

<!-- cart -->

<!-- Product View -->
<div class="modal fade" id="viewproduct-over" tabindex="-1" role="dialog" aria-labelledby="add-payment"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="view-product">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></span>
            <div class="modal-body">
                <div class="row align-items-start data-quickview">

                </div>
            </div>
        </div>
    </div>
</div>



@if($errors->first('emailforget'))
<script>
$("#forgetPass").modal("show");
</script>
@endif
