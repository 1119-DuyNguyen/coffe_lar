@props(['categories'=>[],'keyChildList'=>[],'parameter'=>'category','isFirst'=>'true'])
@php
    $request=request();
    $resetArray=[$parameter=>'','page'=>''];
    foreach ($keyChildList as $val)
        {
            $resetArray[strtolower($val)]='';
        }
    $keyChild= array_shift($keyChildList);
    $parameter=strtolower($parameter);
    $currentParameter=$request->query();
    $currentParameter['page']='';

@endphp
<ul class="tree">
    @if($isFirst)

        <li>
            <a href="{{route('product.index', array_merge($currentParameter,$resetArray))}}"
               style="{{ request()->input($parameter) == '' ?"color: #08C;":"" }}"
            >All</a>
        </li>
    @endif
    @foreach ($categories as $category)
        @if(isset($keyChild) && !empty($category->{$keyChild}) && $category->{$keyChild}->isNotEmpty() )
            <li class="">
                <a class=""
                   href="{{route('product.index',array_merge($currentParameter, [$parameter => $category->slug]))}}"
                   style="{{ $request->input('category') == $category->slug ?"color: #08C;":"" }}"
                >
                    <i
                        class="{{$category->icon}}"></i> {{$category->name}}
                </a>
                <x-recursive-category-tree :categories="$category->{$keyChild}" :keyChildList="$keyChildList"
                                           :parameter="$keyChild" :isFirst="false"></x-recursive-category-tree>

            </li>
        @else
            <li><a class=""
                   href="{{route('product.index', array_merge($currentParameter, [$parameter => $category->slug]))}}"
                   style="{{ $request->input('category') == $category->slug ?"color: #08C;":"" }}"
                ><i
                        class="{{$category->icon}}"></i> {{$category->name}} </a>
            </li>
        @endif

    @endforeach
</ul>
