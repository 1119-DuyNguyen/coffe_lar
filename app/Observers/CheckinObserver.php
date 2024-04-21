<?php

namespace App\Observers;

use App\Models\Opinion;
use App\Models\Checkin;
use App\Models\Contract;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CheckinObserver
{

    public function retrieved(Checkin $checkin)
    {
        $checkin->date = Carbon::parse($checkin->date)->format('Y-m');
    }

//    public function saving(Checkin $checkin)
//    {
//
//    }

    /**
     * Handle the Checkin "created" event.
     */
    public function creating(Checkin $checkin): void
    {
        // dd($checkin);
        try {
            $checkin->date = Carbon::createFromFormat('Y-m', $checkin->date);
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            throw ValidationException::withMessages(['date' => "Thời gian nhập không hợp lệ"]);
        }
        if (Checkin::whereYear('date', '=', $checkin->date->year)
            ->whereMonth(
                'date',
                '=',
                $checkin->date->month
            )->where('contract_id', $checkin->contract_id)->exists()) {
            throw ValidationException::withMessages(
                ['date' => "Đã chấm công thời gian nhập. Vui lòng nhập lại nhân viên hoặc thời gian"]
            );
        }
        // cập nhập các ý kiến sang trạng thái từ chối
        $monthOpinions = Opinion::where('user_id', $checkin->contract->user_id)->whereMonth(
            'day_off',
            '=',
            $checkin->date
        )->whereYear(
            'day_off',
            '=',
            $checkin->date
        )->where('status', '=', 0)->update(['status' => 2]);

        if ($checkin->contract_id) {
            $contract = Contract::findOrFail($checkin->contract_id);
            $count_opinions = Opinion::where('user_id', $checkin->contract->user_id)->whereMonth(
                'day_off',
                '=',
                $checkin->date
            )->whereYear(
                'day_off',
                '=',
                $checkin->date
            )->where('status', '=', 1)->count(DB::raw('DISTINCT DAY(day_off)'));

            $reality_times = 26;
            $checkin->unauth_day_off = max($checkin->auth_day_off - min($count_opinions, 3), 0);

            // lương 1 ngày * số ngày làm , lương 1h *2 * overtimes
            $total_salary = ($contract->salary * $reality_times) + ((($contract->salary) / 8) * 2 * $checkin->over_times) + ($contract->allowance) - ($checkin->unauth_day_off * $contract->salary);
            $reality_times -= $checkin->unauth_day_off;
            $checkin->reality_times = $reality_times;
            $checkin->total_salary = $total_salary;
            // dd($total_salary);
            // $checkin->save();
        }
    }


    /**
     * Handle the Checkin "updated" event.
     */
//    public function updating(Checkin $checkin): void
//    {
//        $count_opinions = 0;
//        if ($checkin->contract_id) {
//            $contract = Contract::findOrFail($checkin->contract_id);
//            $opinions = Opinion::query()->where('user_id', $checkin->contract->user_id)->get();
//            // $opinions->where('contract_id', $checkin->contract_id);
//            foreach ($opinions as $opinion) {
//                if ($opinion->type_opinion_id == 2 || $opinion->type_opinion_id == 3) {
//                    if ($opinion->status == 1 && (date('m', strtotime($opinion->updated_at)) == date('m'))) {
//                        $count_opinions++;
//                    }
//                }
//            }
//
//            $total_salary = null;
//            $reality_times = 26;
//            $checkin->unauth_day_off = $checkin->auth_day_off - min($count_opinions, 3);
//            $total_salary = ($contract->salary * $reality_times) + ((($contract->salary) / 8) * 2 * $checkin->over_times) + ($contract->allowance) - ($checkin->unauth_day_off * $contract->salary);
//            $reality_times = 26 - $checkin->unauth_day_off;
//            $checkin->reality_times = $reality_times;
//            $checkin->total_salary = $total_salary;
//            // dd($total_salary);
//        }
//    }
}
