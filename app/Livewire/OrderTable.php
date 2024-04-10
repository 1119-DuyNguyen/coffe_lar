<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Order;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Get;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;

class OrderTable extends IndexDataTable
{

    protected string $buttonPrintRoute = "user.order.show";
    protected $listeners = ['refreshTable' => '$refresh'];

    protected function datasource(): Builder
    {
        return Order::query()->orderBy('created_at', 'desc');
    }

    protected function getColumns(): array
    {
        return [
            TextColumn::make('id')->label('Id'),
            TextColumn::make('total_price')->label('Tổng tiền'),
            TextColumn::make('total_quantity')->label('Số lượng sản phẩm'),

            ToggleColumn::make('payment_status')->label('Trạng thái thanh toán')->disabled(
                fn($record): bool => $record->payment_status
            ),
            SelectColumn::make('order_status')->label('Trạng thái đơn hàng')
                ->options(
                    OrderStatus::collectionValues()
                )
                ->selectablePlaceholder(false)
                ->disabled(function ($record
                ): bool {
                    return $record->order_status == OrderStatus::canceled || $record->order_status == OrderStatus::delivered;
                }

                )->afterStateUpdated(function ($record, $state) {
                    $this->dispatch('refreshTable');
                }),
            TextColumn::make('created_at')->label('Ngày tạo (định dạng)'),
        ];
    }


    protected function getDataTableFilters(): array
    {
        return [
            Filter::make('created_at')
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
                }),
            TernaryFilter::make('payment_status')->label("Trạng thái thanh toán"),

        ];
    }


}
