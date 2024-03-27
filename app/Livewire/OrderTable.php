<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Order;
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

final class OrderTable extends PowerGridComponent
{
    use WithExport;


    public function setUp(): array
    {
        //        $this->showCheckBox();
        $this->persist(['columns', 'filters', 'sort']);
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
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
        return Order::query()->orderBy('created_at', 'desc');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('total')
            ->addColumn('profit', function (Order $order) {
                return $order->total;
            })
            ->addColumn('payment_status', function ($model) {
                return (!$model->payment_status) ? ('<label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="' . $model->id . '" class="custom-switch-input change-payment-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>') : ("<span class='badge bg-success text-white'> Đã thanh toán</span>");
            })
            ->addColumn('order_status', function ($model) {
                if ($model->order_status == OrderStatus::canceled || $model->order_status == OrderStatus::delivered) {
                    return "<span class='badge " . ($model->order_status == OrderStatus::canceled ? "bg-danger" : "bg-success") . " text-white'>" . OrderStatus::getMessage(
                            OrderStatus::getKey($model->order_status)
                        )['status'] . "</span>";
                }
                $html = '
                    <select name="order_status" data-id="' . $model->id . '" class="form-select  form-control change-status w-100">';

                $statusArray = OrderStatus::getKeys();
                foreach ($statusArray as $key) {
                    if ($model->order_status == OrderStatus::getValue($key)) {
                        $html .= '<option value=' . OrderStatus::getValue(
                                $key
                            ) . ' selected>' . OrderStatus::getMessage($key)['status'] . '</option>';
                    } else {
                        $html .= '<option value=' . OrderStatus::getValue($key) . '>' . OrderStatus::getMessage(
                                $key
                            )['status'] . '</option>';
                    }
                }

                $html .= '</select>';

                return $html;
            })
            ->addColumn(
                'created_at_formatted',
                fn(Order $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s')
            )
            ->addColumn('action', function ($query) {
                //                $showBtn = "<a href='".route('admin.orders.show', $query->id)."' class='btn btn-primary'><i class='far fa-eye'></i></a>";
                //                $deleteBtn = "<a href='".route('admin.orders.destroy', $query->id)."' class='btn btn-danger ml-2 mr-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $deleteBtn = "";

                $printBtn = "<a href='" . route(
                        'user.order.show',
                        $query->id
                    ) . "' class='btn btn-warning'><i class='fas fa-print'></i></a>";

                return $printBtn . $deleteBtn;
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
            Filter::select('payment_status', 'payment_status')
                ->dataSource([['label' => "Đã thanh toán", 'value' => 0, 'label' => "Đã thanh toán", 'value' => 1]])
                ->optionValue('value')
                ->optionLabel('label'),
            Filter::datetimepicker('created_at'),

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
            Column::make('Tổng tiền', 'total'),
            Column::make('Lợi nhuận', 'profit', 'total')->withSum('Tổng', true, false),
            Column::make('Trạng thái thanh toán', 'payment_status'),
            Column::make('Trạng thái đơn hàng', 'order_status'),
            Column::make('Ngày tạo', 'created_at_formatted', 'created_at'),

            Column::make('Thao tác', 'action')->visibleInExport(false)
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
