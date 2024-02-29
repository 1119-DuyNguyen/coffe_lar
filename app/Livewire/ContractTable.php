<?php

namespace App\Livewire;


use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Metadata\Uses;
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

final class ContractTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            // Exportable::make('my-export-file')
            //     ->striped('#A6ACCD')
            //     ->type(Exportable::TYPE_XLS),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('contracts');
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('id_contract')

            /** Example of custom column using a closure **/
            ->addColumn('id_contract_lower', fn ($model) => strtolower(e($model->id_contract)))

            ->addColumn('name')
            ->addColumn('user_id')
            ->addColumn('salary')
            ->addColumn('allowance')
            ->addColumn('end_date_formatted', fn ($model) => Carbon::parse($model->end_date)->format('d/m/Y '))
            ->addColumn('status', function ($model) {
                return '<label class="custom-switch mt-2">
                        <input type="checkbox" ' . ($model->status ? "checked" : '') . ' name="custom-switch-checkbox" data-id="' . $model->id . '" class="custom-switch-input change-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>';
            })
            ->addColumn('created_at_formatted', fn ($model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn ($model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'))

            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.contracts.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('admin.contracts.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Mã hợp đồng', 'id_contract')
                ->sortable()
                ->searchable(),

            Column::make('Loại hợp đồng', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Mã nhân viên', 'user_id'),
            Column::make('Lương', 'salary')
                ->sortable()
                ->searchable(),

            Column::make('Phụ cấp', 'allowance')
                ->sortable()
                ->searchable(),

            Column::make('Ngày tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Ngày kết thúc hợp đồng', 'end_date_formatted', 'end_date')
                ->sortable(),

            Column::make('Trạng thái hợp đồng', 'status'),


            Column::make('Thao Tác', 'action')
        ];
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::inputText('id_contract')->operators(['contains']),
    //         Filter::inputText('name')->operators(['contains']),
    //         Filter::datepicker('end_date'),
    //         Filter::boolean('status'),
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
