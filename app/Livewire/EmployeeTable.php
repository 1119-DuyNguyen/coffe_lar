<?php

namespace App\Livewire;

use App\Enums\EmployeeStatus;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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

class EmployeeTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.employees.edit";
    protected string $buttonDeleteRoute = "admin.employees.destroy";

    public function datasource(): Builder
    {
        return User::employee();
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('employee_code')->label('Mã nhân viên'),
            TextColumn::make('name')->label('Tên')->sortable(),  // Maintains sortable for 'name'
            TextColumn::make('role.name')->label('Chức vụ'),
            ToggleColumn::make('status')->label('Trạng Thái'),
            TextColumn::make('created_at')->label('Ngày Tạo')->sortable(),  // Maintains sortable for 'created_at'
            TextColumn::make('action')->label('Thao Tác'),
        ];
    }

    protected function getDataTableFilters(): array
    {
        return [
            \Filament\Tables\Filters\Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')->label("Từ ngày"),
                    DatePicker::make('created_until')->label("Tới ngày"),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
        ];
    }


}
