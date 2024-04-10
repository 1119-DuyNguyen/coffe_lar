<?php

namespace App\Observers;

use App\Models\Opinion;
use App\Models\Checkin;
use App\Models\Contract;
use Illuminate\Support\Carbon;
use App\Enums\OpinionStatus;
use Illuminate\Http\Request;

class OpinionObserver
{

    /**
     * Handle the Checkin "created" event.
     */
    // public function creating(Checkin $checkin): void
    // {
    // }


    /**
     * Handle the Checkin "updated" event.
     */
    public function updating(Opinion $opinion): void
    {

        $contract = Opinion::findOrFail($opinion->user->user_id);
        if ($opinion->opinion_status == OpinionStatus::accepted && ($opinion->user_id == $contract->user_id)) {
            $contract->checkins->auth_day_off += 1;
        }
        $contract->checkins->save();
    }
}
