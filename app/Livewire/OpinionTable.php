<?php

namespace App\Livewire;

use App\Models\Opinion;
use Filament\Forms\Components\DatePicker;
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

    protected function getDataTableFilters(): array
    {
        return [
            \Filament\Tables\Filters\Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')->label("Từ ngày"),
                    DatePicker::make('created_until')->label("Tới ngày"),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
        ];
    }

  
}
