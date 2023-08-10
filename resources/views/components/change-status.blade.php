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
                    Swal.fire(
                        'Updated!',
                        data.message,
                        'success'
                    )
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            })

        })
    })
</script>
