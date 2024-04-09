<?php

namespace App\Livewire;

use App\Models\Category;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;


class CategoryTable extends IndexDataTable
{

    protected string $buttonEditRoute = "admin.categories.edit";
    protected string $buttonDeleteRoute = "admin.categories.destroy";

    public function datasource(): Builder
    {
        return Category::query();
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('name')->label('Tên Danh Mục'),
            TextColumn::make('created_at')->label('Ngày Tạo')->sortable(),  // Maintains sortable for 'created_at'
            ToggleColumn::make('status')->label('Trạng Thái'),
        ];
    }

}
