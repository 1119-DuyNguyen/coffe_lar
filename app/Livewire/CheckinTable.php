<?php

namespace App\Livewire;

use App\Models\Checkin;
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
use App\Models\User;

class CheckinTable extends IndexDataTable
{
    protected string $buttonEditRoute = "admin.checkins.edit";
    protected string $buttonDeleteRoute = "admin.checkins.destroy";


    public function datasource(): Builder
    {
        return Checkin::query()->with('contract.user');
    }


    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('username')->label('Tên nhân viên'),
            TextColumn::make('date')->label('Ngày chấm công')->sortable(),  // Maintains sortable for 'date'
            TextColumn::make('reality_times')->label('Số ngày công'),
            TextColumn::make('over_times')->label('Số ngày tăng ca'),
            TextColumn::make('salary')->label('Lương cơ bản'),
            TextColumn::make('total_salary')->label('Lương thực lãnh'),
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

    
}
