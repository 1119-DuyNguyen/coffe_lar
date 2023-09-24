@if(session()->has('messageLogin'))
<script>
window.addEventListener('load', (e) => {
    toastr.success("{{session()->get('messageLogin')}}");
})
</script>
@endif

@if(session()->has('messageUpdate'))
<script>
window.addEventListener('load', (e) => {

    toastr.info("{{session()->get('messageUpdate')}}");
})
</script>
@endif


@if(session()->has('activeAcc'))
<script>
window.addEventListener('load', (e) => {
    $.confirm({
        type: 'orange',
        title: 'THÔNG BÁO',
        content: "{{session()->get('activeAcc')}}",
        buttons: {
            'Xác nhận': {
                btnClass: 'btn-orange',
            },
        }
    });
})
</script>
@endif