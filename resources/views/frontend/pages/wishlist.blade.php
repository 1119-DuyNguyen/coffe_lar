@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Wishlist
@endsection

@section('content')



    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                <tr class="d-flex">
                                    <th class="wsus__pro_img">
                                        product item
                                    </th>

                                    <th class="wsus__pro_name" style="width:500px">
                                        product details
                                    </th>

                                    <th class="wsus__pro_status">
                                        quantity
                                    </th>

                                    <th class="wsus__pro_tk" style="width:238px">
                                        price
                                    </th>

                                    <th class="wsus__pro_icon">
                                        action
                                    </th>
                                </tr>
                                @foreach ($wishlistProducts as $item)

                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="{{asset($item->product->thumb_image)}}" alt="product"
                                                 class="img-fluid w-100">
                                            <form method="POST" action="{{route('user.wishlist.destroy', $item->id)}}">
                                                @csrf
                                                <a href="#" onclick="this.closest('form').submit(); return false;"><i
                                                        class="far fa-times"></i></a>
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>

                                        </td>

                                        <td class="wsus__pro_name" style="width:500px">
                                            <p>{{$item->product->name}}</p>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>{{$item->product->qty}}</p>
                                        </td>

                                        <td class="wsus__pro_tk" style="width:238px">
                                            <h6>
                                                {{$settings->currency_icon}}{{$item->product->price}}
                                            </h6>
                                        </td>

                                        <td class="">
                                            <a class="common_btn"
                                               href="{{route('product-detail', $item->product->slug)}}">View Product</a>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-4 justify-content-center">
                {{ $wishlistProducts->links() }}
            </div>
        </div>
    </section>
    <!--============================
        CART VIEW PAGE END
    ==============================-->
@endsection

@push('scripts')

@endpush
