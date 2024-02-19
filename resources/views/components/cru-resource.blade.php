@props([
    'title'=>"",
     "route"=> "",
     "method"=> "PUT",
     'formElements'=>[],
     'resource'=> [],
])
@php
    $isUpdateMethod = ($method === "PUT"|| $method === "PATCH") ? true : false;
    $textSubmitData = $isUpdateMethod ? "Cập nhập" : "Khởi tạo";
@endphp
{{--cru =  create read update --}}

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{  $textSubmitData }}</h4>
                    </div>
                    <div class="card-body">
                        @if(!empty($formElements))
                            <form
                                action="{{$route}}"
                                method="POST">
                                @csrf
                                @method($method)
                                @foreach($formElements as $type => $formElement)

                                    <x-render-form :formElement="$formElement"></x-render-form>

                                @endforeach
                                <button type="submmit" class="btn btn-primary">{{$textSubmitData}}</button>
                            </form>
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


