@props([
    'title'=>"",
     "route"=> "",
     "method"=> "PUT",
     'formElements'=>[],
     'resource'=> [],
     'haveIndexPage'=>true,
])
@php
    $isUpdateMethod = ($method === "PUT"|| $method === "PATCH") ? true : false;
    $indexRoute= ($method === "PUT"|| $method === "PATCH") ? substr($route, 0, strrpos($route, "/")) : $route;
    $textSubmitData = $isUpdateMethod ? "Cập nhập " : "Khởi tạo ";
@endphp
{{--cru =  create read update --}}

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1 class="lowercase-and-capitalize-first-letter">{{$textSubmitData . $title}}</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="lowercase-and-capitalize-first-letter">{{  $textSubmitData }}</h4>

                    </div>
                    <div class="card-body">

                        <div class="w-100 text-right p-4">
                            @if($haveIndexPage)
                                <a class="btn btn-primary "
                                   href="{{$indexRoute}}"><i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách</a>

                            @endif

                        </div>
                        @if(!empty($formElements))
                            <form
                                action="{{$route}}"
                                method="POST">
                                @csrf
                                @method($method)
                                @foreach($formElements as $type => $formElement)

                                    <x-render-form :formElement="$formElement"></x-render-form>

                                @endforeach
                                <button type="submit" class="btn btn-primary">{{$textSubmitData}}</button>
                            </form>
                            @push('scripts')
                                <script>
                                    var forms = document.querySelectorAll("form");

                                    //init span error message
                                    forms.forEach(form => {

                                        let inputExceptCheckboxes = form.querySelectorAll('input:not([type=checkbox])[name]');
                                        inputExceptCheckboxes.forEach(input => {
                                            let parent = input.parentElement;
                                            let span = document.createElement('div');
                                            span.innerHTML = `
                                                <span class="text-danger error-text ${input.name.replace(/\[\]$/, "")}_error"
                                                style="color: red"></span>`;

                                            parent.insertAdjacentHTML('afterend', span.outerHTML);
                                        })
                                        let inputCheckboxes = form.querySelectorAll('input[type=checkbox][name]');
                                        let distinctInputCheckboxes = {};
                                        inputCheckboxes.forEach((input) => {
                                            if (distinctInputCheckboxes[input.name] == null) {
                                                distinctInputCheckboxes[input.name] = input;
                                            }
                                        })
                                        console.log(inputCheckboxes, distinctInputCheckboxes);
                                        for (let name in distinctInputCheckboxes) {
                                            let input = distinctInputCheckboxes[name];
                                            let parent = input.closest('.row');
                                            console.log(parent, "hihfishdf")
                                            let span = document.createElement('div');
                                            span.innerHTML = `
                                                <span class="text-danger error-text ${input.name.replace(/\[\]$/, "")}_error"
                                                style="color: red"></span>`;

                                            parent.insertAdjacentHTML('beforebegin', span.outerHTML);
                                        }

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
                                                                    if (span) {
                                                                        span.innerText = value
                                                                        let input = form.querySelector('input[name=' + prefix + ']');
                                                                        if (input) input.focus();
                                                                    }

                                                                }

                                                            }
                                                        }
                                                        if (FilamentNotification) {
                                                            new FilamentNotification()
                                                                .title('Gửi yêu cầu thất bại')
                                                                .danger()
                                                                .send()

                                                        }

                                                    },
                                                    503: function (responseObject, textStatus, errorThrown) {
                                                        // Service Unavailable (503)
                                                        // This code will be executed if the server returns a 503 response
                                                    }
                                                },
                                                success: function (data) {
                                                    // $('#login').modal('hide');
                                                    // $('#registerForm').modal('hide');
                                                    if (FilamentNotification) {
                                                        new FilamentNotification()
                                                            .title('Gửi yêu cầu thành công')
                                                            .success()
                                                            .send()

                                                    }


                                                }


                                            })

                                        });

                                    })


                                </script>

                            @endpush

                        @else
                            Biểu mẫu chưa khởi tạo. Hãy nhấn F5
                        @endif
                    </div>

                </div>
            </div>
        </div>
        {{ $slot }}
    </div>
</section>


