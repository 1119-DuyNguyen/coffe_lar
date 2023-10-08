<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="sec-heading-flex ">
                <div class="sec-heading-flex-one">
                    <h2>Các sản Phẩm</h2>
                </div>
                <!-- <div class="sec-heading-flex-last">
						<a href="{{route('product.index')}}" class="btn btn-theme">Xem thêm<i class="fas fa-arrow-right ml-2"></i></a>
					</div> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4 mt-4">
            <div class="form-group has-search input-search">
                <i class="fa fa-search form-control-feedback" aria-hidden="true"></i>

                <input type="text" class="form-control" id="searchTerm" name="searchTerm"
                       placeholder="Tìm tên sản phẩm mà bạn quan tâm" wire:model.lazy="searchTerm">
            </div>

        </div>
    </div>
    <div class="row align-items-center">

        @if($products->count()>0)
            @foreach($products as $value)

                <div class="col-12 col-md-6 col-lg-3" wire:key="item--search--product-{{ $value->id }}">
                    <x-product :product="$value"></x-product>


                </div>
            @endforeach

        @else
            <div class="col-12" style="text-align: center; margin-top: 15px;">
                <img src="{{ asset('frontend/img/none.svg')}}" alt="Không tìm thấy"><br>
                <p>Rất tiếc, chúng tôi không tìm thấy kết quả phù hợp. Vui lòng thử lại với một từ khóa khác.</p>
            </div>
        @endif

    </div>
    @if($products->count()>0)
    <div class="row">
        <div class="col-12">

        {{ $products->links() }}
        </div>

    </div>
    @endif

</div>
