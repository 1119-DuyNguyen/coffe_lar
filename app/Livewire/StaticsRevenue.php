<?php

namespace App\Livewire;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StaticsRevenue extends Component
{
    public $selectedYear;

    public function change()
    {
        $this->emit('updateChart');
    }
    public function render()
    {
        if(empty($this->selectedYear))
        {
            $this->selectedYear= date('Y');
        }
        $revenueData = Order::selectRaw(
            'MONTH(created_at) as month,SUM(total) as revenue'
        )
            ->whereYear('created_at', $this->selectedYear)
            ->groupBy( DB::raw('MONTH(created_at)'))
            ->orderBy( 'month')
            ->get();

        return view('livewire.statics-revenue',['revenueData' => $revenueData]);
    }
}
