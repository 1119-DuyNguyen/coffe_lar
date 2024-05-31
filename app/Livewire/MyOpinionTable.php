<?php

namespace App\Livewire;

use App\Models\Opinion;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MyOpinionTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.my-opinions.edit";
    protected string $buttonDeleteRoute = "admin.my-opinions.destroy";


    public function datasource(): Builder
    {
        return Opinion::query()->with('typeOpinion', 'user')->orderBy('created_at', 'desc')->where(
            'user_id',
            Auth::user()->id
        );
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('typeOpinion.name')->label('Loại ý kiến'),

            TextColumn::make('topic')->label('Chủ đề'),  // Maintains sortable for 'topic'
            TextColumn::make('content')->label('Nội dung')->wrap()->limit(25)
                ->tooltip(function ($record) {
                    return $record->content;
                }),
            TextColumn::make('status')
                ->label('Trạng thái ý kiến')
                ->badge()
                ->color(
                    function ($record) {
                        return match ($record->status) {
                            0 => "gray",
                            1 => "success",
                            2 => "danger",
                            default => ""
                        };
                    }


                )
                ->getStateUsing(fn ($record) => match ($record->status) {
                    0 => "Chờ duyệt",
                    1 => "Duyệt",
                    2 => "Từ chối",
                    default => ""
                }),

            TextColumn::make('day_off')->label('Ngày nghỉ'),  // Maintains sortable for 'created_at'
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
                            fn (Builder $query, $date): Builder => $query->whereDate('day_off', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('day_off', '<=', $date),
                        );
                }),
            SelectFilter::make('status')
                ->label("Trạng thái ý kiến")
                ->options([
                    0 => "Chờ duyệt",
                    1 => "Duyệt",
                    2 => "Từ chối"
                ])

            //                ->default(false)
            //                ->trueLabel('Đã duyệt')
            //                ->falseLabel('Chưa duyệt'),

        ];
    }
}
