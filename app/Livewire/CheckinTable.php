<?php

namespace App\Livewire;

use App\Models\Checkin;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Facades\Filter;

class CheckinTable extends IndexDataTable
{
//    protected string $buttonEditRoute = "admin.checkins.edit";
//    protected string $buttonDeleteRoute = "admin.checkins.destroy";
//
//    protected function getAnotherBtnActions(): array
//    {
//        return [
//            EditAction::make('edit-checking')
//                ->label("")
//                ->color('info')
//                ->tooltip("Sửa")
//                ->icon('heroicon-o-pencil-square')
//                ->button()
//                ->form([
//                    TextInput::make('over_times')
//                        ->required()
//                        ->maxLength(255),
//                ])
//        ];
//    }


    public function datasource(): Builder
    {
        return Checkin::query()->with('contract.user');
    }


    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('contract.user.name')->label('Tên nhân viên'),
            TextColumn::make('date')->label('Tháng chấm công')->sortable(),  // Maintains sortable for 'date'
            TextColumn::make('reality_times')->label('Số ngày công'),
            TextColumn::make('unauth_day_off')->label('Số ngày đã nghỉ'),
            TextColumn::make('auth_day_off')->label('Số ngày nghỉ có phép (tối đa 3)'),


            TextColumn::make('over_times')->label('Số giờ tăng ca'),
            TextColumn::make('contract.salary')->label('Lương cơ bản'),
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
