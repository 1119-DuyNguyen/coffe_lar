<?php

namespace App\Observers;

use App\Models\Checkin;
use App\Models\Contract;
use Illuminate\Support\Carbon;

class CheckinObserver
{

    /**
     * Handle the Checkin "created" event.
     */
    public function created(Checkin $checkin): void
    {
        // dd($checkin);
        $contract = $checkin->contract;
        $total_salary = null;
        $reality_times = 26;
        if ($contract && $contract->salary) {
            $total_salary = ($contract->salary * $reality_times) + ($contract->salary * 2 * $checkin->over_times) - ($checkin->unauth_day_off * $contract->salary);
            if ($checkin->auth_day_off > 12) {
                $total_salary -= ($checkin->auth_day_off - 12) * $contract->salary;
            }
            $reality_times = 26 - $checkin->unauth_day_off;
            $checkin->reality_times = $reality_times;
            $checkin->total_salary = $total_salary;
            // dd($total_salary);
            $checkin->save();
        }
    }


    /**
     * Handle the Checkin "updated" event.
     */
    public function updated(Checkin $checkin): void
    {
        $contract = $checkin->contract;
        $total_salary = null;
        $reality_times = 26;
        $total_salary = ($contract->salary * $reality_times) + ($contract->salary * 2 * $checkin->over_times) - ($checkin->unauth_day_off * $contract->salary);
        if ($checkin->auth_day_off > 12) {
            $total_salary -= ($checkin->auth_day_off - 12) * $contract->salary;
        }
        $reality_times = 26 - $checkin->unauth_day_off;
        $checkin->reality_times = $reality_times;
        $checkin->total_salary = $total_salary;
        // dd($total_salary);
        $checkin->update([
            'reality_times' => $reality_times,
            'total_salary' => $total_salary,
        ]);
    }
}
