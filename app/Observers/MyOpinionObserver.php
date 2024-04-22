<?php

namespace App\Observers;

use App\Models\Opinion;
use App\Models\Checkin;
use App\Models\Contract;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class MyOpinionObserver
{


    public function saving(Opinion $opinion)
    {
        try {
            $opinion->day_off = Carbon::parse($opinion->day_off);


            if (Checkin::whereYear('date', '=', $opinion->day_off->year)->whereMonth(
                    'date',
                    '=',
                    $opinion->day_off->month
                )->whereHas('contract', function ($q) use ($opinion) {
                    $q->where('user_id', '=', $opinion->user_id);
                })->exists() || Opinion::where('day_off', $opinion->day_off)->where(
                    'user_id',
                    '=',
                    $opinion->user_id
                )->exists()) {
                throw ValidationException::withMessages(
                    ['day_off' => "Thời gian nhập đã được chấm công hoặc đã xin phép. Hãy nhập lại"]
                );
            }
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            throw ValidationException::withMessages(['day_off' => "Thời gian nhập không hợp lệ"]);
        }
    }


}
