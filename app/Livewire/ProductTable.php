<?php

namespace App\Livewire;

use App\Models\Product;
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
            Header::make()
                ->showSearchInput()
                ->withoutLoading(),
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
            ->addColumn('thumb_image',fn($model)=> "<img width='70px' src='" . asset($model->thumb_image) . "' alt='ảnh sản phẩm'/>")
            ->addColumn('name')
            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn(Product $model) => strtolower(e($model->name)))

//            ->addColumn('slug')
            ->addColumn('category_id', fn($model) => $model->category->name)
            ->addColumn('description',fn($model)=> Str::words($model->description,'8','...'))
            ->addColumn('content',fn($model)=> Str::words($model->content,'8','...'))
            ->addColumn('price')
            ->addColumn('status', function ($model) {
                return '<label class="custom-switch mt-2">
                        <input type="checkbox" '. ($model->status ? "checked": '' ) .' name="custom-switch-checkbox" data-id="' . $model->id . '" class="custom-switch-input change-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>';
            })
            ->addColumn(
                'created_at_formatted',
                fn(Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s')
            )
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.product.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";

                $deleteBtn = "<a href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
//                $moreBtn = '<div class="dropdown dropleft d-inline">
//                <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//                <i class="fas fa-cog"></i>
//                </button>
//                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0; left: 0; will-change: transform;">
//            <a class="dropdown-item has-icon" href="' . route('admin.product.product-variant.index', ['product' => $query->id]) . '"><i class="far fa-file"></i> Variants</a>
//                </div>
//              </div>';
                $moreBtn = "";

                return $editBtn . $deleteBtn . $moreBtn;
            })
            ;
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

            Column::make('Danh mục', 'category_id'),
            Column::make('Mô Tả', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Nội Dung', 'content')
                ->sortable()
                ->searchable(),

            Column::make('Đơn Giá( đ )', 'price')
                ->sortable()
                ->searchable(),
            Column::make('Ngày Tạo', 'created_at_formatted', 'created_at')
                ->sortable(),
            Column::make('Trạng Thái', 'status'),

            Column::make('Thao Tác','action')
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




}
