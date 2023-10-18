<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-start',
        showConfirmButton: false,
        timer: 4000,
        // timerProgressBar: true,
        // didOpen: (toast) => {
        //     toast.addEventListener('mouseenter', Swal.stopTimer)
        //     toast.addEventListener('mouseleave', Swal.resumeTimer)
        // }
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
            401: function (responseObject, textStatus, errorThrown) {
                errorToast('Bạn chưa đăng nhập');
                Swal.fire({
                    title: 'Bạn chưa đăng nhập',
                    text: "Hãy đăng nhập để thực hiện thao tác",
                    icon: 'error',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Đăng nhập',
                    denyButtonText: `Bạn chưa có tài khoản ?`,
                    cancleButtonText: `Quay lại`,
                    denyButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        if ($('#login'))
                            $('#login').modal('show')
                        else window.location.reload();
                    } else if (result.isDenied) {
                        if ($('#registerForm'))
                            $('#registerForm').modal('show')
                        else window.location.reload();
                    }
                })

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

    });
</script>
