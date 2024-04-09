<?php

namespace App\Livewire;

use App\Enums\EmployeeStatus;
use App\Models\Provider;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
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

class ProviderTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.providers.edit";
    protected string $buttonDeleteRoute = "admin.providers.destroy";

    public function datasource(): Builder
    {
        return Provider::query();
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id')->sortable(),
            TextColumn::make('name')->label('Tên nhà cung cấp'),
            TextColumn::make('description')->label('mô tả'),
        ];
    }


}
