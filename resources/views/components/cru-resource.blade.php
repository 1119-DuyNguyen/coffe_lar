{{--cru =  create read update --}}
@props([
    'title'=>"",
     "route"=> "",
     "method"=> "PUT",
     'textSubmitData'=> ($method == "PUT"|| $method == "PATCH") ? "Cập nhập" : "Khởi tạo",
      'formElements'=>[],
])
{{--dataExample formDATA--}}
{{--[ typeInput =>  [--}}
{{--'name'=>"",--}}
{{--'value' => string || array,--}}
{{--'class' => "",--}}
{{--'title => ""--}}
{{--]]--}}
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
                        <form action="{{$route}}" method="POST">
                            @csrf
                            @method($method)
                            @foreach($formElements as $type => $formElement)
                                <x-render-form :formElement = "$formElement" :type="$type"></x-render-form>

                            @endforeach
                            <button type="submmit" class="btn btn-primary">{{$textSubmitData}}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{ $slot }}
    </div>
</section>


