<?php

namespace App\Livewire;

use App\Models\Role;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

class RoleTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.roles.edit";
    protected string $buttonDeleteRoute = "admin.roles.destroy";

    public function datasource(): Builder
    {
        return Role::query();
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('name')->label('Tên chức vụ'),
            TextColumn::make('description')->label('Mô Tả'),
            TextColumn::make('created_at')->label('Ngày Tạo'),
        ];
    }
}
