<?php

namespace App\Livewire;

use App\Enums\EmployeeStatus;
use App\Models\Provider;
use App\Models\User;
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

final class ProviderTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        //        $this->showCheckBox();

        return [
//            Exportable::make('export')
//                ->striped()
//                ->type(Exportable::TYPE_XLS),
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
        return Provider::query();
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
            ->addColumn('description')
            ->addColumn('action', function ($query) {
                if ($query->id != 1) {
                    $editBtn = "<a href='" . route(
                            'admin.providers.edit',
                            $query->id
                        ) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                    $deleteBtn = "<a href='" . route(
                            'admin.providers.destroy',
                            $query->id
                        ) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                    return $editBtn . $deleteBtn;
                }
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Tên nhà cung cấp', 'name')
                ->sortable()
                ->searchable(),
            Column::make('mô tả', 'description'),
            Column::make('Thao Tác', 'action')
        ];
    }

  
}
