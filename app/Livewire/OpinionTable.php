<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Opinion;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;

class OpinionTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.opinions.edit";
    protected string $buttonDeleteRoute = "admin.opinions.destroy";


    public function datasource(): Builder
    {
        return Opinion::query()->with('typeOpinion', 'user')->orderBy('created_at', 'desc');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('typeOpinion.name')->label('Loại ý kiến'),
            TextColumn::make('user.name')->label('Người đăng'),

            TextColumn::make('topic')->label('Chủ đề'),  // Maintains sortable for 'topic'
            TextColumn::make('content')->label('Nội dung')->wrap()->limit(25)
                ->tooltip(function ($record) {
                    return $record->content;
                }),
            ToggleColumn::make('is_accepted')->label('Đã duyệt')
                ->disabled(function ($record
                ): bool {
                    return $record->is_accepted;
                }),
            TextColumn::make('created_at')->label('Ngày tạo'),  // Maintains sortable for 'created_at'
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
                }),
            TernaryFilter::make('is_accepted')
                ->label("Trạng thái ý kiến")
                ->default(false)
                ->trueLabel('Đã duyệt')
                ->falseLabel('Chưa duyệt'),

        ];
    }


}
