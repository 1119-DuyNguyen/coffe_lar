<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Opinion;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
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
            SelectColumn::make('status')->label('Trạng thái ý kiến')
                ->options(
                    [
                        0 => "Chờ duyệt",
                        1 => "Duyệt",
                        2 => "Từ chối"
                    ]
                )
                ->selectablePlaceholder(false)
                ->disabled(function ($record
                ): bool {
                    return $record->status != 0;
                }
                )->afterStateUpdated(function ($record, $state) {
                    $this->dispatch('refreshTable');
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
            SelectFilter::make('status')
                ->label("Trạng thái ý kiến")
                ->options([
                    0 => "Chờ duyệt",
                    1 => "Duyệt",
                    2 => "Từ chối"
                ])->default(0)

//                ->default(false)
//                ->trueLabel('Đã duyệt')
//                ->falseLabel('Chưa duyệt'),

        ];
    }


}
