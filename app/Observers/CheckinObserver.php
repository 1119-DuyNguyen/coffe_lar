<?php

namespace App\Observers;

use App\Models\Opinion;
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
        $count_opinions = 0;


        $opinions1 = Opinion::query()->where('user_id', $checkin->contract->user_id)->where('status', 0)->get();
        foreach ($opinions1 as $opinion) {
            if ($opinion->type_opinion_id == 2) {
                $opinion->status = 2; // Trạng thái "Từ chối"
                $opinion->save();
            }
        }
        if ($checkin->contract_id) {
            $contract = Contract::findOrFail($checkin->contract_id);
            $opinions = Opinion::query()->where('user_id', $checkin->contract->user_id)->get();
            // $opinions->where('contract_id', $checkin->contract_id);
            foreach ($opinions as $opinion) {
                if ($opinion->type_opinion_id == 2 || $opinion->type_opinion_id == 3) {
                    if ($opinion->status == 1 && (date('m', strtotime($opinion->updated_at)) == date('m')))
                        $count_opinions++;
                }
            }

            $total_salary = null;
            $reality_times = 26;
            $checkin->unauth_day_off = $checkin->auth_day_off - min($count_opinions, 3);
            $total_salary = ($contract->salary * $reality_times) + ($contract->salary * 2 * $checkin->over_times) - ($checkin->unauth_day_off * $contract->salary);
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
        $count_opinions = 0;
        if ($checkin->contract_id) {
            $contract = Contract::findOrFail($checkin->contract_id);
            $opinions = Opinion::query()->where('user_id', $checkin->contract->user_id)->get();
            // $opinions->where('contract_id', $checkin->contract_id);
            foreach ($opinions as $opinion) {
                if ($opinion->type_opinion_id == 2 || $opinion->type_opinion_id == 3) {
                    if ($opinion->status == 1 && (date('m', strtotime($opinion->updated_at)) == date('m')))
                        $count_opinions++;
                }
            }

            $total_salary = null;
            $reality_times = 26;
            $checkin->unauth_day_off = $checkin->auth_day_off - min($count_opinions, 3);
            $total_salary = ($contract->salary * $reality_times) + ($contract->salary * 2 * $checkin->over_times) - ($checkin->unauth_day_off * $contract->salary);
            $reality_times = 26 - $checkin->unauth_day_off;
            $checkin->reality_times = $reality_times;
            $checkin->total_salary = $total_salary;
            // dd($total_salary);
        }
    }
}
