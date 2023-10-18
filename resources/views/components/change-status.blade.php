@props(['url','selectorBtn'=>'.change-status'])
<script>
    $(document).ready(function(){
        $('body').on('click', '{{$selectorBtn}}', function(){
            let isChecked = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "{{$url}}",
                method: 'PUT',
                data: {
                    status: isChecked,
                    id: id
                },
                success: function(data){
                    successToast(data.message);
                    // Swal.fire(
                    //     {  title: data.message,
                    //         icon: 'success',
                    //         confirmButtonText:"Xác nhận"
                    //     }
                    //
                    // )
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            })

        })
    })
</script>
