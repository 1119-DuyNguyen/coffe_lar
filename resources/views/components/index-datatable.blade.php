@props([
    'title'=>"Mặc định",
     "route"=> "",
     'table'=>"",
     'useCreateBtn'=> true
])
<div>
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1 class="lowercase-and-capitalize-first-letter">{{$title}}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="lowercase-and-capitalize-first-letter">Danh sách {{$title}}</h4>
                        </div>

                        <div class="card-body">

                            @if($useCreateBtn==true)
                                <div class="w-100 text-right p-4">
                                    <a class="btn btn-primary " href="{{route($route)}}"><i
                                            class="fas fa-plus"></i></a>

                                </div>
                            @endif
                            {{ $header ?? "" }}

                            @livewire($table)
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
