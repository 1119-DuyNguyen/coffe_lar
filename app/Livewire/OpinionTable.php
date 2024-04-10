<?php

namespace App\Livewire;

use App\Enums\OpinionStatus;
use App\Models\Opinion;
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

final class OpinionTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Opinion::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('type_opinion', fn ($model) => $model->typeOpinion->name)
            ->addColumn('topic')

            /** Example of custom column using a closure **/
            ->addColumn('topic_lower', fn (Opinion $model) => strtolower(e($model->topic)))

            ->addColumn('content')
            ->addColumn('created_at_formatted', fn (Opinion $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.opinions.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('admin.opinions.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            })
            ->addColumn('opinion_status', function ($model) {
                if ($model->opinion_status == OpinionStatus::rejected || $model->opinion_status == OpinionStatus::accepted) {
                    return "<span class='badge " . ($model->opinion_status == OpinionStatus::rejected ? "bg-danger" : "bg-success") . " text-white'>" . OpinionStatus::getMessage(
                        OpinionStatus::getKey($model->opinion_status)
                    )['status'] . "</span>";
                }
                $html = '
                    <select name="opinion_status" data-id="' . $model->id . '" class="form-select  form-control change-status w-100">';

                $statusArray = OpinionStatus::getKeys();
                foreach ($statusArray as $key) {
                    if ($model->opinion_status == OpinionStatus::getValue($key)) {
                        $html .= '<option value=' . OpinionStatus::getValue(
                            $key
                        ) . ' selected>' . OpinionStatus::getMessage($key)['status'] . '</option>';
                    } else {
                        $html .= '<option value=' . OpinionStatus::getValue($key) . '>' . OpinionStatus::getMessage(
                            $key
                        )['status'] . '</option>';
                    }
                }

                $html .= '</select>';

                return $html;
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),
            Column::make('Loại ý kiến', 'type_opinion'),
            Column::make('Chủ đề', 'topic')
                ->sortable()
                ->searchable(),

            Column::make('Nội dung', 'content'),
            Column::make('Trạng thái ý kiến', 'opinion_status'),
            Column::make('Ngày tạo', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Thao Tác', 'action')

        ];
    }

    public function filters(): array
    {
        return [
            Filter::select('opinion_status', 'opinion_status')
                ->dataSource(OpinionStatus::collectionValues())
                ->optionValue('value')
                ->optionLabel('label'),
        ];
    }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert(' . $rowId . ')');
    // }

    // public function actions(\App\Models\Opinion $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: ' . $row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:bopinion-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
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
