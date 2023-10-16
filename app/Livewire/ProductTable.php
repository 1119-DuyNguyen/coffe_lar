<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

final class ProductTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
//        $this->showCheckBox();

        return [
//            Exportable::make('export')
//                ->striped()
//                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Product::query()->with('category');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('thumb_image')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (Product $model) => strtolower(e($model->name)))

//            ->addColumn('slug')
            ->addColumn('category_id', fn ($model) => $model->category->name)
            ->addColumn('description')
            ->addColumn('content')
            ->addColumn('price')
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Ảnh Nền', 'thumb_image')
                ->sortable()
                ->searchable(),

            Column::make('Tên Sản Phẩm', 'name')
                ->sortable()
                ->searchable(),

//            Column::make('Slug', 'slug')
//                ->sortable()
//                ->searchable(),

            Column::make('Loại Sản Phẩm', 'category_id'),
            Column::make('Mô Tả', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Nội Dung', 'content')
                ->sortable()
                ->searchable(),

            Column::make('Đơn Giá', 'price')
                ->sortable()
                ->searchable(),

            Column::make('Trạng Thái', 'status')
                ->toggleable(),

            Column::make('Ngày Tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Thao Tác')
        ];
    }

//    public function filters(): array
//    {
//        return [
//            Filter::inputText('name')->operators(['contains']),
//            Filter::inputText('slug')->operators(['contains']),
//            Filter::boolean('status'),
//            Filter::datetimepicker('created_at'),
//        ];
//    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Product $row): array
    {
        return [
            Button::add('edit')
                ->slot('Sửa')
                ->class('btn btn-primary')
                ->route('admin.product.edit', ['product' => $row->id]),
            Button::add('destroy')
                ->slot('Xoá')
                ->class('btn btn-danger')
                ->route('admin.product.destroy', ['product' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
