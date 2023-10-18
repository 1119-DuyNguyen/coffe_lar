@props(['url','selectorBtn'=>'.change-status','type'=>'click'])
<script>
    $(document).ready(function(){
        @if($type=='click')
        $('body').on('click', '{{$selectorBtn}}', function(){
            let value=$(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "{{$url}}",
                method: 'PUT',
                data: {
                    status: value,
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

        @elseif($type=='select')
        $('body').on('change', '{{$selectorBtn}}', function(){
            let value=$(this).val();
            let id = $(this).data('id');

            $.ajax({
                url: "{{$url}}",
                method: 'PUT',
                data: {
                    status: value,
                    id: id
                },
                success: function(data){
                    Toast.fire({
                        icon: data.status,
                        title: data.message
                    })
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

        @endif

    })
</script>
