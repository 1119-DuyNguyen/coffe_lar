<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //x
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
