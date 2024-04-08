<?php

namespace App\Livewire;

use App\Models\Opinion;
use Filament\Tables\Columns\TextColumn;
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

class OpinionTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.opinions.edit";
    protected string $buttonDeleteRoute = "admin.opinions.destroy";


    public function datasource(): Builder
    {
        return Opinion::query()->with('typeOpinion');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('typeOpinion.name')->label('Loại ý kiến'),
            TextColumn::make('topic')->label('Chủ đề')->sortable(),  // Maintains sortable for 'topic'
            TextColumn::make('content')->label('Nội dung'),
            TextColumn::make('created_at')->label('Ngày tạo')->sortable(),  // Maintains sortable for 'created_at'
        ];
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::inputText('topic')->operators(['contains']),
    //         Filter::inputText('content')->operators(['contains']),
    //         Filter::datetimepicker('created_at'),
    //     ];
    // }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert(' . $rowId . ')');
    // }

    // public function actions(\App\Models\Opinion $row): array
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
