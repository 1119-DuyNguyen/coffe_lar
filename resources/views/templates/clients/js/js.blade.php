@php use Illuminate\Support\Facades\Session; @endphp
@include('setup-js')
<script>


    const formAjax= function (selector,callbackSuccess){
        var forms = document.querySelectorAll(selector);
        // console.log(forms,"hi")

        //init span error message
        forms.forEach(form => {
            let inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                let parent = input.parentElement;
                let span = document.createElement('div');
                span.innerHTML = `
                    <span class="text-danger error-text ${input.name}_error"
                    style="color: red"></span>`;

                parent.insertAdjacentHTML('afterend', span.outerHTML);
            })
            let selects = form.querySelectorAll('select');
            selects.forEach(select => {
                let parent = select.parentElement;
                let span = document.createElement('div');
                span.innerHTML = `
                    <span class="text-danger error-text ${select.name}_error"
                    style="color: red"></span>`;

                parent.insertAdjacentHTML('afterend', span.outerHTML);
            })
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                var all = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: all,
                    beforeSend: function () {

                        $(document).find('span.error-text').text('');
                    },
                    statusCode: {
                        422: function (responseObject, textStatus, jqXHR) {
                            // validation error fails
                            if (responseObject.responseJSON) {
                                let errors = responseObject.responseJSON.errors;
                                // console.log(errors)
                                if (errors) {
                                    for (const [prefix, value] of Object.entries(errors)) {
                                        let span = form.querySelector('span.' + prefix + '_error');
                                        span.innerText = value

                                        let input = form.querySelector('input[name=' + prefix + ']');
                                        input.focus();
                                    }

                                }
                            }

                        },
                    },
                    success: callbackSuccess
                    //     function (data) {
                    //     $('#login').modal('hide');
                    //     $('#registerForm').modal('hide');
                    //
                    //     Swal.fire(
                    //         'Đăng nhập thành công',
                    //         '',
                    //         'success'
                    //     ).then((result)=>{
                    //         window.location.reload();
                    //
                    //     })
                    // }
                })

            });

        })
    }

    $(document).on('click', '.quickView', function (e) {
        e.preventDefault();
        let slug = $(this).data('slug');
        let url = "{{ route('product.show', ":slug") }}";
        url = url.replace(':slug', slug);
        $.ajax({
            url: url,
            type: 'get',
            success: function (data) {
                if (data) {
                    $('.data-quickview').empty();
                    $('.data-quickview').html(data);
                    $('#viewproduct-over').modal('show');
                }
            }
        });
    })
    $(document).on('click', '#addCart,#updateCart,.add-cart', function (e) {
        e.preventDefault();
        var frm = $(this).closest('form');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log(data)
                loadCart(data);
                // loadCartItem(data);
                $('#viewproduct-over').modal('hide');

                successToast('Thao tác thành công');
            }
        });

    })
    $(document).on('click', '#delItemCart', function (e) {
        e.preventDefault();
        let keyCart = $(this).data('id');
        let url = "{{ route('cart.destroy', ":idCart") }}";
        url = url.replace(':idCart', keyCart);
        $.ajax({
            url: url,
            type: 'DELETE',

            success(data) {
                loadCart(data);
                // loadCartItem(data);
                errorToast('Đã xoá món');

            }
        })
    })

    function loadCart(data) {
        let cartPage = $("#cart");
        if (cartPage) {
            console.log(cartPage);
            cartPage.empty();
            cartPage.html(data);
        }
        $("#cart-sidebar").empty();
        $("#cart-sidebar").html(data);
        if ($('#totalCartQuantity').val()) {
            $('#header-cart-quantity').text($("#totalCartQuantity").val());
        } else {
            $('#header-cart-quantity').text(0);
        }
    }

    $(document).on('click', '.quick-cart', function (e) {
        e.preventDefault();

        let keyCart = $(this).data('id');
        let url = "{{ route('cart.show', ":idCart") }}";
        url = url.replace(':idCart', keyCart);
        $.ajax({
            url: url,
            type: 'get',
            data: {
                keyCart: keyCart,
            },
            success(data) {
                if (data) {
                    $('.data-quickview').empty();
                    $('.data-quickview').html(data);
                    $('#viewproduct-over').modal('show');
                }
            }
        })
    })


    $(document).on('click', '.up_user', function (e) {
        e.preventDefault()
        if ($(this).hasClass('btn-primary')) {
            $('.update_user').submit()
        } else {
            let form = document.querySelector('.form-upuser');
            form.classList.add('editing')
            $(this).addClass('btn-primary')
            $(this).text('Lưu')
        }

    })



</script>
