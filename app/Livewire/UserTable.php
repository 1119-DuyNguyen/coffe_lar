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

class UserTable extends IndexDataTable
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
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('status', function ($model) {
                if ($model->id != 1) {
                    return '<label class="custom-switch mt-2">
                        <input type="checkbox" ' . ($model->status ? "checked" : '') . ' name="custom-switch-checkbox" data-id="' . $model->id . '" class="custom-switch-input change-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>';
                }
            })
            ->addColumn(
                'created_at_formatted',
                fn(User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s')
            )
            ->addColumn('action', function ($query) {
                if ($query->id != 1) {
                    $editBtn = "<a href='" . route(
                            'admin.users.edit',
                            $query->id
                        ) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                    $deleteBtn = "<a href='" . route(
                            'admin.users.destroy',
                            $query->id
                        ) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                    return $editBtn . $deleteBtn;
                }
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Tên', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Điện Thoại', 'phone')
                ->sortable()
                ->searchable(),
            Column::make('Trạng Thái', 'status'),
            Column::make('Ngày Tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Thao Tác', 'action')
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

    //    #[\Livewire\Attributes\On('edit')]
    //    public function edit($rowId): void
    //    {
    //        $this->js('alert(' . $rowId . ')');
    //    }
    //
    //    public function actions(\App\Models\User $row): array
    //    {
    //        return [
    //            Button::add('edit')
    //                ->slot('<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>')
    //                ->class('btn btn-primary')
    //                ->route('admin.users.edit', ['user' => $row->id]),
    //            Button::add('destroy')
    //                ->slot('<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>')
    //                ->class('btn btn-danger')
    //                ->route('admin.users.destroy', ['user' => $row->id]),
    //        ];
    //    }

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
    protected function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }
}
