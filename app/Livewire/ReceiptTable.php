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
        return Receipt::query();
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
//          ->addColumn('category_id', fn($model) => $model->category->name)
            ->addColumn('provider_name');
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
        ];
    }
}
