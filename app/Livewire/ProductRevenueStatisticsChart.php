<?php

namespace App\Livewire;

use App\Models\ProductReport;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ProductRevenueStatisticsChart extends ApexChartWidget
{

    protected static ?string $heading = '';
    protected static ?string $loadingIndicator = 'Đang tải';

//    protected static bool $isLazy = true;
    protected static bool $deferLoading = true;


    protected function getFormSchema(): array
    {
        return [
            Select::make('type')->label("Loại thống kê")->options([
                "year" => 'Năm',
                "month" => 'Tháng',
                "quarter" => 'Quý'

            ])->default("year"),
            DatePicker::make('date_start')->label("Từ ngày")
                ->default(now()->startOfYear()->subYears(3)),
            DatePicker::make('date_end')
                ->default(now()->endOfYear())->label("Tới ngày"),
        ];
    }

    protected function getOptions(): array
    {
        if (!$this->readyToLoad) {
            return [];
        }
        $dateStart = Carbon::parse($this->filterFormData['date_start']);
        $dateEnd = Carbon::parse($this->filterFormData['date_end']);
        $data = Trend::model(ProductReport::class)
            ->between(
                start: $dateStart,
                end: $dateEnd,
            )
            ->perMonth()
            ->sum('price_sale');
//        dd($this->getLabelsAndValues($data));


        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
                "locales" => [$this->getLocaleVn()],
                "defaultLocale" => 'vi',
//                "toolbar" => ['show' => false]
            ],
            'series' => [
                [
                    'name' => 'Doanh thu',
                    'data' => $this->getLabelsAndValues($data)->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'xaxis' => [
                'categories' => $this->getLabelsAndValues($data)->map(fn(TrendValue $value) => $value->date),
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],

            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }


    private function getLabelsAndValues($data)
    {
        $type = $this->filterFormData['type'];
        $dateStart = Carbon::parse($this->filterFormData['date_start']);
        $dateEnd = Carbon::parse($this->filterFormData['date_end']);
        // build query
        $data = Trend::model(ProductReport::class)
            ->between(
                start: $dateStart,
                end: $dateEnd,
            );
        switch ($type) {
            case "year":
                $data = $data->perYear();
                break;
            case "month":
            case "quarter":
                $data = $data->perMonth();

                break;
        }
        $data = $data->sum('price_sale');

        // build labels and values
        if ($type == "quarter" && count($data) > 0) {
            $transformData = collect();
            $lastLabel = "";
            $lastSum = 0;
            foreach ($data as $value) {
                $date = Carbon::parse($value->date);
                $label = $date->year . '-Q' . $date->quarter;
                if (!empty($lastLabel) && $label != $lastLabel) {
                    $transformData->push(new TrendValue($lastLabel, $lastSum));
                    $lastSum = 0;
                }
                $lastLabel = $label;
                $lastSum += $value->aggregate;
            }
            $transformData->push(new TrendValue($lastLabel, $lastSum));
            return $transformData;
        }
        return $data;
    }


    private function getLocaleVn()
    {
        $json = '{
  "name": "vi",
  "options": {
    "months": [
      "Tháng Một",
      "Tháng Hai",
      "Tháng Ba",
      "Tháng Tư",
      "Tháng Năm",
      "Tháng Sáu",
      "Tháng Bảy",
      "Tháng Tám",
      "Tháng Chín",
      "Tháng Mười",
      "Tháng Mười Một",
      "Tháng Mười Hai"
    ],
    "shortMonths": [
      "T1",
      "T2",
      "T3",
      "T4",
      "T5",
      "T6",
      "T7",
      "T8",
      "T9",
      "T10",
      "T11",
      "T12"
    ],
    "days": [
      "Chủ Nhật",
      "Thứ Hai",
      "Thứ Ba",
      "Thứ Tư",
      "Thứ Năm",
      "Thứ Sáu",
      "Thứ Bảy"
    ],
    "shortDays": ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
    "toolbar": {
      "exportToSVG": "Xuất SVG",
      "exportToPNG": "Xuất PNG",
      "exportToCSV": "Xuất CSV",
      "menu": "Menu",
      "selection": "Lựa chọn",
      "selectionZoom": "Phóng to lựa chọn",
      "zoomIn": "Phóng to",
      "zoomOut": "Thu nhỏ",
      "pan": "Di chuyển",
      "reset": "Đặt lại phóng to"
    }
  }
}';
        return json_decode($json);
    }

}
