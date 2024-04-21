<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends IndexDataTable
{


    protected string $buttonEditRoute = "admin.users.edit";
    protected string $buttonDeleteRoute = "admin.users.destroy";

    protected function getColumns(): array
    {
        return [
//            TextColumn::make('id')->label('Id'),
            TextColumn::make('name')->label('Tên')->searchable(),
            TextColumn::make('email')->label('Email')->searchable(),
            TextColumn::make('phone')->label('Điện thoại')->searchable(),

//            TextColumn::make('latestContract.role.name')
//                ->label('Chức vụ')
//                ->wrap()
//                ->getStateUsing(
//                    fn($record
//                    ) => ($record->latestContract->role->name ?? ((empty($record->employee_code)) ? 'Người mua hàng' : "Chưa thêm chức vụ"))
//                ),


            ToggleColumn::make('status')->label('Trạng Thái'),
            TextColumn::make('created_at')->label('Ngày Tạo'),
        ];
    }


    public function datasource(): Builder
    {
        return User::buyer();
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
