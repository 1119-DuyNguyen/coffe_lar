<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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

final class ReceiptTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        return [
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
        return Receipt::query()->with('provider');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('provider_name', function ($model) {
                return $model->provider->name;
            })
            ->addColumn('total')
            ->addColumn('action', function ($query) {
                if ($query->id != 1) {
                    $editBtn = "<a href='" . route(
                            'admin.receipts.edit',
                            $query->id
                        ) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                    $deleteBtn = "<a href='" . route(
                            'admin.receipts.destroy',
                            $query->id
                        ) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                    return $editBtn . $deleteBtn;
                }
            });;
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),

            Column::make('Tên phiếu nhập', 'name')
                ->sortable()
                ->searchable(),

            //            Column::make('Slug', 'slug')
            //                ->sortable()
            //                ->searchable(),

            Column::make('Nhà cung cấp', 'provider_name'),
            Column::make('Số lượng nhập', 'total'),
            Column::make('Thao Tác', 'action')
        ];
    }
}
