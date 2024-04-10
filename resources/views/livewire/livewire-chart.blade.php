<div>
    <div>

        <label for="typeStatistic">
            Chọn loại thống kê

        </label>
        <div>
            <form>

                <select wire:model.change="typeStatistic" wire:change="refreshDataTable" id="typeStatistic"
                        class="form-control"
                >
                    <option disabled selected> Chọn loại thống kê</option>

                    <option value="1"> Năm</option>
                    <option value="2"> Tháng</option>
                    <option value="3"> Quý</option>

                </select>
            </form>

        </div>


    </div>
    <div class="mt-5">

        {{--        @livewire(\App\Livewire\ProductRevenueStatisticsChart::class)--}}
    </div>
</div>
