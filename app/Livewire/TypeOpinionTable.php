<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
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

final class TypeOpinionTable extends PowerGridComponent
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
        return DB::table('type_opinions');
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')

            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn ($model) => strtolower(e($model->name)))

            ->addColumn('created_at_formatted', fn ($model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn ($model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'))

            // ->addColumn('status', function ($model) {
            //     return '<label class="custom-switch mt-2">
            //             <input type="checkbox" ' . ($model->status ? "checked" : '') . ' name="custom-switch-checkbox" data-id="' . $model->id . '" class="custom-switch-input change-status" >
            //             <span class="custom-switch-indicator"></span>
            //         </label>';
            // })

            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.type-opinions.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('admin.type-opinions.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            });
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Loại ý kiến', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Ngày tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Ngày cập nhật', 'updated_at_formatted', 'updated_at')
                ->sortable(),

            // Column::make('Trạng Thái', 'status'),

            Column::make('Thao Tác', 'action')

        ];
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::inputText('name')->operators(['contains']),
    //         Filter::datetimepicker('created_at'),
    //         Filter::datetimepicker('updated_at'),
    //     ];
    // }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert(' . $rowId . ')');
    // }

    // public function actions($row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: ' . $row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

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
