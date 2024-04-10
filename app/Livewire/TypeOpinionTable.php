<?php

namespace App\Livewire;

use App\Models\TypeOpinion;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class TypeOpinionTable extends IndexDataTable
{

    protected string $buttonEditRoute = "admin.type-opinions.edit";
    protected string $buttonDeleteRoute = "admin.type-opinions.destroy";


    public function datasource(): Builder
    {
        return TypeOpinion::query();
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('ID'),
            TextColumn::make('name')->label('Loại ý kiến'),
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
