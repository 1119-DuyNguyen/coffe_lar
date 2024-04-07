<?php

namespace App\Livewire;


use App\Models\Receipt;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ReceiptTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.receipts.edit";
    protected string $buttonDeleteRoute = "admin.receipts.destroy";


    protected function datasource(): Builder
    {
        return Receipt::query()->with('provider');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('name')->label('Tên phiếu nhập'),
            TextColumn::make('provider.name')->label('Nhà cung cấp'),
            TextColumn::make('total_quantity')->label('Số lượng nhập'),
        ];
    }


}
