@php use Illuminate\Support\Facades\Session; @endphp
@include('setup-js')
<script>



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
