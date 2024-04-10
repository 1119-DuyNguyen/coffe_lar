<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;

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
