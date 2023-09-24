@extends('templates.clients.frontend')
@section('content')

<section class="gray" style="min-height: 40vh;">
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="search-order-title">
                <img src="{{ asset('frontend/img/search.svg')}}" alt="ai con"><br>
                <span>TRA CỨU ĐƠN HÀNG</span>
            </h3>
            <div class="form-search-order">
                <input class="form-control-order" />
                <button class="btn-form-search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="content-search">

        </div>
    </div>
</section>
<script>
window.onload = () => {
    const btnSearch = document.querySelector('.btn-form-search');
    const input = document.querySelector('.form-control-order');
    const data = document.querySelector('.content-search');
    btnSearch.addEventListener('click', () => {
        let keyWord = input.value;
        let url = "{{ route('result.searchOrder')}}";
        (async () => {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    keyWord: keyWord,
                })
            });
            if (response && response.status === 200) {
                const check = await response.json();
                if (check) {
                    data.innerHTML = check.resultSearchOrder;
                }
            } else {
                alert('laasy du lieu that bai !!!')
            }
        })();
    });
}
</script>
@stop