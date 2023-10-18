<?php

namespace App\Livewire;

use App\Models\Category;
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

final class CategoryTable extends PowerGridComponent
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
        return Category::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('icon',function($query){
                return '<i style="font-size:40px" class="'.$query->icon.'"></i>';
            })
            ->addColumn('status', function ($model) {
                return '<label class="custom-switch mt-2">
                        <input type="checkbox" '. ($model->status ? "checked": '' ) .' name="custom-switch-checkbox" data-id="' . $model->id . '" class="custom-switch-input change-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>';
            })
//            ->addColumn('slug')
            ->addColumn(
                'created_at_formatted',
                fn(Category $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s')
            )
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('admin.category.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.category.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn.$deleteBtn;
            })
            ;
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Tên Danh Mục', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Biểu Tượng', 'icon')
                ->sortable()
                ->searchable(),
            Column::make('Ngày Tạo', 'created_at_formatted', 'created_at')
                ->sortable(),
            Column::make('Trạng Thái', 'status'),
//
//            Column::make('Slug', 'slug')
//                ->sortable()
//                ->searchable(),



            Column::make('Thao Tác','action')
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
