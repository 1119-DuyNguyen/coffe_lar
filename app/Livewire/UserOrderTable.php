<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

final class UserOrderTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        //        $this->showCheckBox();

        return [
            //            Exportable::make('export')
            //                ->striped()
            //                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput()
                ->withoutLoading(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Order::query()->where('user_id', Auth::user()->id);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('phone_receiver')
            ->addColumn('total')
            ->addColumn('payment_status', function ($model) {
                return ($model->payment_status
                    ?  ("<span class='badge bg-success text-white'> Đã thanh toán</span>")
                    : ("<span class='badge bg-danger text-white'> Chưa thanh toán</span>"));
            })
            ->addColumn('order_status',  function ($model) {
                $string = match ($model->order_status) {
                    OrderStatus::canceled => 'bg-danger',
                    OrderStatus::delivered => 'bg-success',
                    default => 'bg-info',
                };;
                return "<span class='badge " . $string . " text-white'>" . OrderStatus::getMessage(OrderStatus::getKey($model->order_status))['status'] . "</span>";

                //                return OrderStatus::getMessage(OrderStatus::getKey($model->order_status))['status'];
            })
            ->addColumn('created_at_formatted', fn (Order $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('action', function ($query) {
                //                $showBtn = "<a href='".route('admin.orders.show', $query->id)."' class='btn btn-primary'><i class='far fa-eye'></i></a>";
                //                $deleteBtn = "<a href='".route('admin.orders.destroy', $query->id)."' class='btn btn-danger ml-2 mr-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $printBtn = "<a href='" . route('user.order.show', $query->id) . "' class='btn btn-warning'><i class='fas fa-print'></i></a>";

                return $printBtn;
            });
    }
    public function filters(): array
    {
        /*
        Uses the codes collection as datasource for the options with the key "label" as the option label.
        */
        return [
            Filter::select('order_status', 'order_status')
                ->dataSource(OrderStatus::collectionValues())
                ->optionValue('value')
                ->optionLabel('label'),
            //            Filter::select('payment_status', 'payment_status')
            //                ->dataSource(collect([
            //                    ['label'=>'Chưa thanh toán','value'=>0],
            //                    ['label'=>'Đã thanh toán','value'=>1],
            //                ]))
            //                ->optionValue('value')
            //                ->optionLabel('label'),
        ];
    }
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Số điện thoại', 'phone_receiver')->searchable(),
            Column::make('Tổng tiền', 'total')
                ->sortable(),
            Column::make('Trạng thái thanh toán', 'payment_status')->sortable(),
            Column::make('Trạng thái đơn hàng', 'order_status'),
            Column::make('Ngày tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Thao tác', 'action')
        ];
    }

    //    public function filters(): array
    //    {
    //        return [
    //            Filter::datetimepicker('created_at'),
    //        ];
    //    }



    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
