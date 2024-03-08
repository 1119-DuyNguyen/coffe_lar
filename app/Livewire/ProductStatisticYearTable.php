<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ProductStatisticYearTable extends PowerGridComponent
{
    use WithExport;

    public int $perPage = 0;
    public string $primaryKey = 'product_id';
    public string $sortField = 'product_id';

    public function setUp(): array
    {
        //        $this->showCheckBox();
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->withoutLoading(),

        ];
    }

    public function datasource(): Builder
    {
        return OrderProduct::query()->with('product')->select(
            'product_id'
        )->selectRaw('count(*) as total, YEAR(created_at) as yearProduct')
            ->groupByRaw('YEAR(created_at)')
            ->groupBy(

                'product_id'
            );
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('year', function (OrderProduct $orderProduct) {
                return $orderProduct->yearProduct;
            })
            ->addColumn('product_id', function (OrderProduct $orderProduct) {
                return $orderProduct->product->name;
            })
            ->addColumn('count-product', function (OrderProduct $orderProduct) {
                return $orderProduct->total;
            });
    }

    public function filters(): array
    {
        /*
        Uses the codes collection as datasource for the options with the key "label" as the option label.
        */
        return [
            Filter::datetimepicker('year', 'created_at'),

        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Năm', 'year'),

            Column::make('Sản phẩm', 'product_id'),

            Column::make('Số lượng bán ra', 'count-product'),
            Column::make('Lợi nhuận ( đợi nhập hàng)', 'count-product'),


        ];
    }

    //    public function filters(): array
    //    {
    //        return [
    //            Filter::datetimepicker('created_at'),
    //        ];
    //    }


}
