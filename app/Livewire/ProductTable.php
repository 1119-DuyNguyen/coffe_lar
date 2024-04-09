<?php

namespace App\Livewire;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;

class ProductTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.products.edit";
    protected string $buttonDeleteRoute = "admin.products.destroy";


    public function datasource(): Builder
    {
        return Product::query()->with('category');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('thumb_image')->label('Ảnh Nền'),
            TextColumn::make('name')->label('Tên Sản Phẩm'),
            TextColumn::make('category_id')->label('Danh mục'),
            TextColumn::make('description')->label('Mô Tả')->limit(25),
            TextColumn::make('content')->label('Nội Dung')->limit(25),
            TextColumn::make('price')->label('Đơn Giá( đ )'),
            TextColumn::make('created_at')->label('Ngày Tạo'),
            ToggleColumn::make('status')->label('Trạng Thái'),

        ];
    }

}
