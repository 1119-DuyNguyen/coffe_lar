@php use Illuminate\Support\Facades\Session; @endphp
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    function errorToast(message) {
        Toast.fire({
            icon: 'error',
            title: message
        })
    }

    function successToast(message) {
        Toast.fire({
            icon: 'success',
            title: message
        })
    }

    @if(Session::has('success'))
    successToast("{{Session::get('success')}}")
    @php
        Session::remove('success')
    @endphp
    @endif
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        ,
        statusCode: {
            422: function (responseObject, textStatus, jqXHR) {
                // validation error fails
                let message = "Máy chủ không thể xử lý yêu cầu. Vui lòng thử lại sau";
                if (responseObject.responseJSON) {
                    let messageRes = responseObject.responseJSON.message;


                    if (messageRes) {
                        message = messageRes

                    }

                }
                errorToast(message);

            },
            0: function (responseObject, textStatus, errorThrown) {
                errorToast('Không có kết nối mạng. Vui lòng thử lại sau');

            },
            404: function (responseObject, textStatus, errorThrown) {
                errorToast('Yêu cầu gửi tới trang không tồn tại');
            },
            500: function (responseObject, textStatus, errorThrown) {
                errorToast('Máy chủ bận. Vui lòng thử lại sau');
                // Service Unavailable (503)
                // This code will be executed if the server returns a 503 response
            },
            419: function (responseObject, textStatus, errorThrown) {
                let message = responseObject.responseJSON.message;
                if (message) {
                    errorToast(message);

                } else errorToast('Hãy bấm F5 để làm mới trang');
            },
            503: function (responseObject, textStatus, errorThrown) {
                // Service Unavailable (503)
                // This code will be executed if the server returns a 503 response
            },
            "parsererror": function (responseObject, textStatus, errorThrown) {
                // Service Unavailable (503)
                // This code will be executed if the server returns a 503 response
            },
        },
        // error: function (jqXHR, exception) {
        //     if (jqXHR.status === 0) {
        //         toastr.error('Không có kết nối mạng. Vui lòng thử lại sau');
        //
        //     } else if (jqXHR.status == 404) {
        //         toastr.error('Yêu cầu gửi tới trang không tồn tại');
        //
        //     } else if (jqXHR.status == 500) {
        //         toastr.error('Máy chủ bận. Vui lòng thử lại sau');
        //
        //     } else if (jqXHR.status = 419) {
        //         let message = JSON.parse(jqXHR.responseText).message;
        //         if (message) {
        //             toastr.error(JSON.parse(jqXHR.responseText).message);
        //
        //         } else toastr.error('Hãy bấm F5 để làm mới trang');
        //
        //     }
        //         // else if(jqXHR.status == 422){
        //         //     toastr.error( JSON.parse(jqXHR.responseText).message);
        //         //
        //     // }
        //     else if (exception === 'parsererror') {
        //         // alert('Requested JSON parse failed.');
        //         toastr.error('Dữ liệu bị lỗi. Vui lòng thử lại sau');
        //
        //     } else if (exception === 'timeout') {
        //         // alert('Time out error.');
        //         toastr.error('Yêu cầu gửi quá thời gian ');
        //     } else if (exception === 'abort') {
        //         // alert('Ajax request aborted.');
        //         toastr.error('Yêu cầu bị máy chủ từ chối ');
        //
        //     } else {
        //         toastr.error('Có lỗi đang xảy ra. Vui lòng thử lại sau ');
        //         // alert(jqXHR.responseText);
        //         // alert('Uncaught Error.\n' + jqXHR.responseText);
        //
        //     }
        // }
        // statusCode: {
        //     401: function() {
        //         alert("401");
        //     }
        // }
    });
    $(document).on('click', '.quickView', function () {
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
    $(document).on('click', '#addCart,#updateCart', function (e) {
        e.preventDefault();
        var frm = $(this).closest('form');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
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
            console.log(cart);
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

    {{--$(document).on('click', '.btn-user-detailorder', function(e) {--}}
    {{--    e.preventDefault()--}}
    {{--    let id = $(this).data('id');--}}
    {{--    $.ajax({--}}
    {{--        url: '{{ route("user.index")}}',--}}
    {{--        type: 'post',--}}
    {{--        data: {--}}
    {{--            id: id,--}}
    {{--        },--}}
    {{--        success: function(data) {--}}
    {{--            if (data) {--}}
    {{--                $('.data-user-detail').empty()--}}
    {{--                $('.data-user-detail').html(data)--}}
    {{--                $('#viewuserDetail').modal('show')--}}
    {{--            }--}}
    {{--        }--}}
    {{--    });--}}
    {{--})--}}


</script>
