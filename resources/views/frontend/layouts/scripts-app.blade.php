<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // cart function
        // get subtotal of cart and put it on dom
        const renderCartSubTotal= function(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.total') }}",
                success: function(data) {
                    $('#sub_total').text("{{$settings->currency_icon}}"+data);
                    $('#mini_cart_subtotal').text(("{{$settings->currency_icon}}"+data));
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        const fetchSidebarCartProduct=function () {
            var urlBase = "{{asset('')}}" + '';
            var urlProduct = "product-detail/";
            $.ajax({
                method: 'GET',
                url: '{{route('cart.all')}}',
                success: function (data) {

                    $('.mini_cart_wrapper').html("");
                    var html = '';
                    let count = 0;
                    try {
                        for (let item in data) {
                            ++count;
                            var product = data[item];
                            html += `
                            <li id="mini_cart_${product.id}">
                    <div class="wsus__cart_img">
                        <a href="#"><img src="${urlBase + product['attributes']['image']}" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon remove_sidebar_product" data-id="${product.id}" href="#" ><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="${urlBase + urlProduct + product['attributes']['slug']}">${product['name']}</a>
                        <p>
                            {{$settings->currency_icon}}${product['price']}
                            </p>
                            <small>Variants total: {{$settings->currency_icon}} ${product['attributes']['variants_total']}</small>
                        <br>
                        <small>Qty: ${product['quantity']}</small>
                    </div>
                    </li>
                            `;
                        }
                    }
                    catch (e) {
                        html="Cart is empty !";
                    }
                    if(count==0) html="Cart is empty !";

                    $('#cart-count').html(count);
                    $('.mini_cart_wrapper').html(html);
                    renderCartSubTotal();

                    // Swal.fire(
                    //     'Updated!',
                    //     data.message,
                    //     'success',
                    // )

                },
                error: function (data) {
                    Swal.fire(
                        'Something went wrong!',
                        data.message,
                        'error'
                    )
                }
            })
        }
        const bindDeleteCartHeader=function () {
            $('body').on('click', '.remove_sidebar_product', function (event) {
                event.preventDefault();

                let rowId=$(this).data('id');
                let deleteUrl = "{{route('cart.index')}}/"+rowId;
                $.ajax({
                    type: 'DELETE',
                    url: deleteUrl,
                    success: function (data) {
                        let productId='#mini_cart_'+rowId;
                        $(productId).remove();
                        Swal.fire({
                            position: 'top-start',
                            icon: 'success',
                            title: 'Delete cart successfully !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        renderCartSubTotal();
                        var cartCount=document.getElementById('cart-count')
                        var count= String(Number.parseInt(cartCount.innerText)-1).padStart(1,'0');
                        cartCount.innerText=count;

                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                })

            })
        }
        bindDeleteCartHeader();
        const ajaxCartStoreFunction= function (classSelector){
            $(document).ready(function (){
                console.log( $(classSelector));
                $(classSelector).on('submit', function (e){
                    e.preventDefault();
                    let formData= $(this).serialize();
                    $.ajax({
                        method:'POST',
                        data: formData,
                        url:'{{route('cart.store')}}',
                        success: function(data){
                            fetchSidebarCartProduct();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })


                        },
                        error: function(data){
                            Swal.fire(
                                'Something went wrong!',
                                data.message,
                                'error'
                            )
                        }
                    })
                })
            })
        }
        ajaxCartStoreFunction('.shopping-cart-form');

        // add product to wishlist
        $('.add_to_wishlist').on('click', function(e){
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{route('user.wishlist.store')}}",
                data: {id:id},
                success:function(data){
                    if(data.status === 'success'){
                        $('#wishlist_count').text(data.count)
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else if(data.status === 'error'){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                error: function(data){
                    // console.log(data);

                    if(data.status== 401 && data?.responseJSON?.message)
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.responseJSON.message,
                            text: "You must login to account for this action.",
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                        }).then((result)=> {
                            if (result.isConfirmed) {
                            window.location.href = "{{route('login')}}";
                            } else {
                            }
                        })
                    }

                }
            })
        })

        // newsletter
        $('#newsletter').on('submit', function(e){
            e.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: "{{route('newsletter-request')}}",
                data: data,
                beforeSend: function(){
                    $('.subscribe_btn').text('Loading...');
                },
                success: function(data){
                    if(data.status === 'success'){
                        $('.subscribe_btn').text('Subscribe');
                        $('.newsletter_email').val('');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else if(data.status === 'error'){
                        $('.subscribe_btn').text('Subscribe');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                error: function(data){
                    let errors = data.responseJSON.errors;
                    if(errors){
                        $.each(errors, function(key, value){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: value,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        })
                    }
                    $('.subscribe_btn').text('Subscribe');
                }
            })
        })


    })
</script>
