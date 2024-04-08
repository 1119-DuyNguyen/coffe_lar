<?php

namespace App\Livewire;


use App\Models\Receipt;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ReceiptTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.receipts.edit";
    protected string $buttonDeleteRoute = "admin.receipts.destroy";


    protected function datasource(): Builder
    {
        return Receipt::query()->with('provider')->orderBy('created_at', 'desc');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('name')->label('Tên phiếu nhập'),
            TextColumn::make('provider.name')->label('Nhà cung cấp'),
            TextColumn::make('total_quantity')->label('Số lượng nhập'),
            TextColumn::make('created_at')->label('Ngày nhập'),

        ];
    }

    protected function getDataTableFilters(): array
    {
        return [
            Filter::make('created_at')
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
