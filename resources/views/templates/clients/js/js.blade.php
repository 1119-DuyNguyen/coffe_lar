<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    ,
    error: function(jqXHR, exception) {
        if (jqXHR.status === 0) {
            toastr.error('Không có kết nối mạng. Vui lòng thử lại sau');

        } else if (jqXHR.status == 404) {
            toastr.error('Yêu cầu gửi tới trang không tồn tại');

        } else if (jqXHR.status == 500) {
            toastr.error('Máy chủ bận. Vui lòng thử lại sau');

        }
        else if(jqXHR.status=419)
        {
            let message=JSON.parse(jqXHR.responseText).message;
            if(message)
            {
                toastr.error( JSON.parse(jqXHR.responseText).message);

            }
            else toastr.error('Hãy bấm F5 để làm mới trang');

        }
        else if(jqXHR.status == 422){
            toastr.error( JSON.parse(jqXHR.responseText).message);

        }
        else if (exception === 'parsererror') {
            // alert('Requested JSON parse failed.');
            toastr.error('Dữ liệu bị lỗi. Vui lòng thử lại sau');

        } else if (exception === 'timeout') {
            // alert('Time out error.');
            toastr.error('Yêu cầu gửi quá thời gian ');
        } else if (exception === 'abort') {
            // alert('Ajax request aborted.');
            toastr.error('Yêu cầu bị máy chủ từ chối ');

        } else {
            toastr.error('Có lỗi đang xảy ra. Vui lòng thử lại sau ');
            // alert(jqXHR.responseText);
            // alert('Uncaught Error.\n' + jqXHR.responseText);

        }
    }
    // statusCode: {
    //     401: function() {
    //         alert("401");
    //     }
    // }
});
$(document).on('click', '.quickView', function() {
    let slug = $(this).data('slug');
    let url = "{{ route('product.show', ":slug") }}";
    url = url.replace(':slug', slug);
    $.ajax({
        url: url,
        type: 'get',
        success: function(data) {
            if (data) {
                $('.data-quickview').empty();
                $('.data-quickview').html(data);
                $('#viewproduct-over').modal('show');
            }
        }
    });
})
$(document).on('click', '#addCart,#updateCart', function(e) {
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
            toastr.options.timeOut = 30;
            toastr.success('Thao tác thành công');
        }
    });

})
$(document).on('click', '#delItemCart', function(e) {
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
            toastr.options.timeOut = 30;
            toastr.options = {
                "timeout": 30,
                "positionClass": "toast-top-left",
            }
            toastr.error('Đã xoá món');

        }
    })
})

function loadCart(data) {
    $("#cart-sidebar").empty();
    $("#cart-sidebar").html(data);
    if ($('#totalCartQuantity').val()) {
        $('#header-cart-quantity').text($("#totalCartQuantity").val());
    } else {
        $('#header-cart-quantity').text(0);
    }
}

$(document).on('click', '.quick-cart', function(e) {
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



//đăng nhập với tài khoản
$(document).on('click', '#loginAcc', function(e) {
    e.preventDefault();
    let email = $('.emailAcc').val();
    let password = $('.passwordAcc').val();
    $.ajax({
        url: "{{ route('login')}}",
        type: 'post',
        data: {
            email: email,
            password: password

        },
        success: function(data) {
            if (data == true) {
                location.reload();
                toastr.options.timeOut = 30;
                toastr.success('Đăng nhập thành công');
            } else {
                $('.massage').empty()
                $('.massage').append(data.loginAcc)
                $('.massage').show().delay(3000).fadeOut()
            }

        }
    });
})

$(document).on('click', '.sendComments', function(e) {
    e.preventDefault()
    let textContent = $('.content-commment')
    let content = textContent.val()
    let url = $(this).attr('href');
    let list_commment = $('.review-list');

    if (content) {
        $.ajax({
            url: url,
            type: 'post',
            data: {
                content: content,
            },
            success: function(data) {
                if (data) {
                    list_commment.html(data)
                }
            }
        });
    } else {
        textContent.addClass('danger')
        toastr.error('Bình luận không được bỏ trống.')
    }
})

$(document).on('click', '.reply_commment', function(e) {
    e.preventDefault()
    let id_rep = $(this).data('id')
    $('.form-rep-' + id_rep).slideToggle();
})

$(document).on('click', '.sendCommentsReply', function(e) {
    e.preventDefault()
    let id = $(this).data('id')
    let textContent = $('.content-' + id)
    let content = textContent.val()
    let url = $(this).attr('href');
    let list_commment = $('.review-list');

    if (content) {
        $.ajax({
            url: url,
            type: 'post',
            data: {
                content: content,
                id_reply: id
            },
            success: function(data) {
                if (data) {
                    console.log(data)
                    list_commment.html(data)
                }
            }
        });
    } else {
        textContent.addClass('danger')
        toastr.error('Bình luận không được bỏ trống.')
    }

})

$(document).on('click', '.reply_commment.delete', function(e) {
    e.preventDefault()
    let url = $(this).attr('href');
    let list_commment = $('.review-list');
    $.ajax({
        url: url,
        type: 'get',
        success: function(data) {
            if (data) {
                list_commment.html(data)
            }
        }
    });
})



$(document).on('click', '.up_user', function(e) {
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

$(document).on('click', '.btn-wishlist', function(e) {
    e.preventDefault()
    let url = $(this).attr('href')
    console.log(url)
    $.ajax({
            method: 'post',
            url: url,
        })
        .done(function(results) {
            toastr.info(results.message);
        });
});
</script>
