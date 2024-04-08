<?php

namespace App\Livewire;

use App\Models\Contract;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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

class ContractTable extends IndexDataTable
{

    protected string $buttonEditRoute = "admin.contracts.edit";
    protected string $buttonDeleteRoute = "admin.contracts.destroy";

    public function datasource(): Builder
    {
        return Contract::query()->with('user');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('code')->label('Mã hợp đồng'),
            TextColumn::make('name')->label('Loại hợp đồng'),
            TextColumn::make('user.name')->label('Tên nhân viên'),
            TextColumn::make('salary')->label('Lương'),
            TextColumn::make('allowance')->label('Phụ Cấp'),
            TextColumn::make('end_date')->label('Ngày hết hạn')->sortable(),  // Maintains sortable for 'end_date'
            ToggleColumn::make('status')->label('Trạng thái'),
            TextColumn::make('created_at')->label('Ngày tạo')->sortable(),  // Maintains sortable for 'created_at'
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
    //     ];
    // }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert(' . $rowId . ')');
    // }

    // public function actions(\App\Models\Contract $row): array
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
