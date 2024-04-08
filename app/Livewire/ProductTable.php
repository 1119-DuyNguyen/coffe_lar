<?php

namespace App\Livewire;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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
            TextColumn::make('description')->label('Mô Tả'),
            TextColumn::make('content')->label('Nội Dung'),
            TextColumn::make('price')->label('Đơn Giá( đ )'),
            TextColumn::make('created_at')->label('Ngày Tạo'),
            ToggleColumn::make('status')->label('Trạng Thái'),

        ];
    }
}
