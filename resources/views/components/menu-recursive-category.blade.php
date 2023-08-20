@props(['categories'=>[],'keyChildList'=>[],'parameter'=>'category'])
@php

$keyChild= array_shift($keyChildList);
$parameter=strtolower($parameter);
@endphp
<ul class="dropdown-menu">

@foreach ($categories as $category)
    @if(isset($keyChild) && count($category->{$keyChild})>0 )
        <li class="nav-item dropend">
            <a class="nav-link dropdown-toggle" href="{{route('product.index', [$parameter => $category->slug])}}" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <i
                    class="{{$category->icon}}"></i> {{$category->name}}
            </a>
            <x-menu-recursive-category :categories="$category->{$keyChild}" :keyChildList="$keyChildList" :parameter="$keyChild"></x-menu-recursive-category>

        </li>
    @else
        <li><a class="dropdown-item" href="{{route('product.index', [$parameter => $category->slug])}}"><i
                    class="{{$category->icon}}"></i> {{$category->name}} </a>
        </li>
    @endif
@endforeach
</ul>
