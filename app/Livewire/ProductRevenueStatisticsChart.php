<?php

namespace App\Livewire;

use App\Models\ProductReport;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\View\View;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ProductRevenueStatisticsChart extends ChartWidget
{

    protected static ?string $heading = 'Thống kê doanh thu';

    protected function getData(): array
    {
        $data = Trend::model(ProductReport::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }


//    public function render(): View
//    {
//        return view('livewire.livewire-chart');
//    }
}
