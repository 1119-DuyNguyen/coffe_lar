<?php

namespace App\Livewire;

use App\Models\Provider;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ProviderTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.providers.edit";
    protected string $buttonDeleteRoute = "admin.providers.destroy";

    public function datasource(): Builder
    {
        return Provider::query();
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id')->sortable(),
            TextColumn::make('name')->label('Tên nhà cung cấp'),
            TextColumn::make('description')->label('mô tả'),
        ];
    }


}
