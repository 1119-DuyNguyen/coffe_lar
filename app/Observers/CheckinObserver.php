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
    public function creating(Checkin $checkin): void
    {
        // dd($checkin);
        if ($checkin->contract_id) {
            $contract = Contract::findOrFail($checkin->contract_id);
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
            // $checkin->save();
        }
    }


    /**
     * Handle the Checkin "updated" event.
     */
    public function updating(Checkin $checkin): void
    {
        if ($checkin->contract_id) {
            $contract = Contract::findOrFail($checkin->contract_id);
            $total_salary = null;
            $reality_times = 26;
            $total_salary = ($contract->salary * $reality_times) + ($contract->salary * 2 * $checkin->over_times) - ($checkin->unauth_day_off * $contract->salary);
            if ($checkin->auth_day_off > 12) {
                $total_salary -= ($checkin->auth_day_off - 12) * $contract->salary;
            }
            $reality_times = 26 - $checkin->unauth_day_off;
            $checkin->reality_times = $reality_times;
            $checkin->total_salary = $total_salary;
        }
        // dd($total_salary);
    }
}
