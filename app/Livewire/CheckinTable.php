<?php

namespace App\Livewire;

use App\Models\Checkin;
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
use App\Models\User;

final class CheckinTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
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
        return Checkin::query()->with('contract.user');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('username', fn ($model) => $model->contract->user->name)
            ->addColumn('reality_times')
            ->addColumn('auth_day_off')
            ->addColumn('over_times')
            ->addColumn('salary', fn ($model) => $model->contract->salary)
            ->addColumn('total_salary')
            ->addColumn('date_formatted', fn (Checkin $model) => Carbon::parse($model->date)->format('d/m/Y'))
            ->addColumn(
                'created_at_formatted',
                fn (Checkin $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s')
            )
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route(
                    'admin.checkins.edit',
                    $query->id
                ) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route(
                    'admin.checkins.destroy',
                    $query->id
                ) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),
            Column::make('Tên nhân viên', 'username'),
            Column::make('Ngày chấm công', 'date_formatted', 'date')
                ->sortable(),

            Column::make('Số ngày công', 'reality_times')
                ->sortable()
                ->searchable(),
            Column::make('Số ngày nghỉ có phép', 'auth_day_off')
                ->sortable()
                ->searchable(),
            Column::make('Số ngày tăng ca', 'over_times')
                ->sortable()
                ->searchable(),

            Column::make('Lương cơ bản', 'salary')
                ->sortable()
                ->searchable(),

            Column::make('Lương thực lãnh', 'total_salary')
                ->sortable()
                ->searchable(),
            Column::make('Thao Tác', 'action')

        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('date'),
            Filter::select('username', 'user_id')
                ->dataSource(User::all())
                ->optionValue('id')
                ->optionLabel('name'),
        ];
    }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert('.$rowId.')');
    // }

    // public function actions(\App\Models\Checkin $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

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
