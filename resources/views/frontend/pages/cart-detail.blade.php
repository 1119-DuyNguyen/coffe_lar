@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Cart Details
@endsection

@section('content')



    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                <tr class="d-flex">
                                    <th class="wsus__pro_img">
                                        product item
                                    </th>

                                    <th class="wsus__pro_name">
                                        product details
                                    </th>

                                    <th class="wsus__pro_tk">
                                        unit price
                                    </th>

                                    <th class="wsus__pro_tk">
                                        total
                                    </th>

                                    <th class="wsus__pro_select">
                                        quantity
                                    </th>



                                    <th class="wsus__pro_icon">
                                        <a href="#" class="common_btn clear_cart">clear cart</a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($cartItems as $item)
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{asset($item->attributes->image)}}" alt="product"
                                                                       class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{!! $item->name !!}</p>
                                            @foreach ($item->attributes->variants as $key => $variant)
                                                <span>{{$key}}: {{$variant['name']}} ({{$settings->currency_icon.$variant['price']}})</span>
                                            @endforeach

                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>{{$settings->currency_icon.$item->price}}</h6>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6 id="{{$item->id}}">{{$settings->currency_icon.($item->price + $item->attributes->variants_total) * $item->quantity}}</h6>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <div class="product_qty_wrapper">
                                                <input class="product-qty" data-id="{{$item->id}}" type="number" min="1" value="{{$item->quantity}}"  />
                                            </div>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <form method="POST" action="{{route('cart.destroy', $item->id)}}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" ><i class="far fa-times"></i></button>
                                                <input type="hidden" name="_method" value="DELETE">
{{--                                            <a href="javascript:void(0);" onclick="this.closest('form').submit(); return false;"></a>--}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (count($cartItems) === 0)
                                    <tr class="d-flex" >
                                        <td class="wsus__pro_icon" rowspan="2" style="width:100%">
                                            Cart is empty!
                                        </td>
                                    </tr>

                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                        <p>coupon(-): <span id="discount">{{$settings->currency_icon}}{{getCartDiscount()}}</span></p>
                        <p class="total"><span>total:</span> <span id="cart_total">{{$settings->currency_icon}}{{getMainCartTotal()}}</span></p>

                        <form id="coupon_form">
                            <input type="text" placeholder="Coupon Code" name="coupon_code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{route('user.checkout')}}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="{{route('home')}}"><i
                                class="fab fa-shopify"></i> Keep Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--============================
          CART VIEW PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>

        $(document).ready(function(){

            // increment product quantity
            $('.product-qty').on('change',function (){
                let input = $(this);
                let quantity = parseInt(input.val()) ;
                let id = input.data('id');
                if(quantity < 1){
                    input.val(1)
                    Swal.fire(
                        'Quantity can\'t be less!',
                        "",
                        'warning'
                    )
                    return;
                }
                $.ajax({
                    url: "{{route('cart.index')}}/"+id,
                    method: 'PUT',
                    data: {
                        qty: quantity
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            let productId = '#'+id;
                            let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                            $(productId).text(totalAmount)

                            fetchSidebarCartProduct()
                            calculateCouponDescount()
                            //
                            // Swal.fire(
                            //     'Updated!',
                            //     data.message,
                            //     'success'
                            // )

                        }else if (data.status === 'error'){
                            Swal.fire(
                                'Something went wrong!',
                                data.message,
                                'error'
                            )
                            if(data.qty)
                            {
                                input.val(data.qty)
                            }
                            // toastr.error(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })




            // clear cart
            $('.clear_cart').on('click', function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will clear your cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'get',
                            url: "{{route('cart.clear')}}",
                            success: function(data){
                                if(data.status === 'success'){
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error){
                                console.log(error);
                            }
                        })
                    }
                })
            })



            // applay coupon on cart

            $('#coupon_form').on('submit', function(e){
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('coupon.apply') }}",
                    data: formData,
                    success: function(data) {
                         if (data.status === 'success'){
                            calculateCouponDescount()
                             Swal.fire(
                                 {
                                     position: 'top-end',
                                     icon: 'success',
                                     title:   data.message,
                                     showConfirmButton: false,
                                     timer: 1500
                                 }
                             );
                        }else if (data.status === 'error'){
                             Swal.fire(
                                 {
                                     position: 'top-end',
                                     icon: 'error',
                                     title:   data.message,
                                     showConfirmButton: false,
                                     timer: 1500
                                 }
                             );
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    }
                })

            })

            // calculate discount amount
            function calculateCouponDescount(){
                $.ajax({
                    method: 'GET',
                    url: "{{ route('coupon.calculation') }}",
                    success: function(data) {
                        if(data.status === 'success'){
                            $('#discount').text('{{$settings->currency_icon}}'+data.discount);
                            $('#cart_total').text('{{$settings->currency_icon}}'+data.cart_total);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }


        })
    </script>
@endpush
