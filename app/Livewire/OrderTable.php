<?php

namespace App\Livewire;

use App\Models\Order;
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

        return [
//            Exportable::make('export')
//                ->striped()
//                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Order::query();
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
            ->addColumn('payment_status', function ($model) {
                switch ($model->payment_status) :
                    case '0':
                        return 'Đã thanh toán';
                    case '1':
                        return 'Chưa thanh toán';
                    default:
                        return 'Chưa xác định';
                endswitch;
            })
            ->addColumn('order_status',  function ($model) {
                switch ($model->order_status) :
                    case '0':
                        return 'Đang chờ xác nhận';
                    case '1':
                        return 'Sẵn sàng giao hàng';
                    case '2':
                        return 'Đang giao hàng';
                    case '3':
                        return 'Đã giao hàng';
                    case '4':
                        return 'Hủy';
                    default:
                        return 'Chưa xác định';
                endswitch;
            })
            ->addColumn('created_at_formatted', fn(Order $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Tổng tiền', 'total')
                ->sortable(),
            Column::make('Hình thức thanh toán', 'payment_status'),
            Column::make('Trạng thái', 'order_status'),
            Column::make('Ngày tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Thao tác')
        ];
    }

//    public function filters(): array
//    {
//        return [
//            Filter::datetimepicker('created_at'),
//        ];
//    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Order $row): array
    {
        return [
            Button::add('edit')
                ->slot('Sửa')
                ->class('btn btn-primary')
                ->route('admin.order.edit', ['order' => $row->id]),
            Button::add('destroy')
                ->slot('Xoá')
                ->class('btn btn-danger')
                ->route('admin.order.destroy', ['order' => $row->id]),
        ];
    }

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
