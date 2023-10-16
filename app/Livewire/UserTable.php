<?php

namespace App\Livewire;

use App\Models\User;
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

final class UserTable extends PowerGridComponent
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
        return User::query()->with('role');
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
            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn(User $model) => strtolower(e($model->name)))
            ->addColumn('email')
            ->addColumn('address')
            ->addColumn('phone')
            ->addColumn('role_id', function ($model){
                return $model->role->name;
            })
            ->addColumn('created_at_formatted', fn(User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Tên', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Địa Chỉ', 'address')
                ->sortable()
                ->searchable(),

            Column::make('Điện Thoại', 'phone')
                ->sortable()
                ->searchable(),

            Column::make('Vai Trò', 'role_id'),
            Column::make('Ngày Tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Thao Tác')
        ];
    }

//    public function filters(): array
//    {
//        return [
//            Filter::inputText('name')->operators(['contains']),
//            Filter::inputText('email')->operators(['contains']),
//            Filter::inputText('address')->operators(['contains']),
//            Filter::inputText('phone')->operators(['contains']),
//            Filter::datetimepicker('created_at'),
//        ];
//    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Sửa')
                ->class('btn btn-primary')
                ->route('admin.user.edit', ['user' => $row->id]),
            Button::add('destroy')
                ->slot('Xoá')
                ->class('btn btn-danger')
                ->route('admin.user.destroy', ['user' => $row->id]),
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

