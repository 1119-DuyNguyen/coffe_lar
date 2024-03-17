<?php

namespace App\Models;

use App\Observers\CheckinObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'date',
        'auth_day_off',
        'unauth_day_off',
        'reality_times',
        'over_times',
        'salary',
        'total_salary'
    ];

    public function contract(): belongsTo
    {
        return $this->belongsTo(Contract::class);
    }
    protected static function boot()
    {
        // you MUST call the parent boot method
        // in this case the \Illuminate\Database\Eloquent\Model
        parent::boot();

        // note I am using static::observe(...) instead of Config::observe(...)
        // this way the child classes auto-register the observer to their own class
        static::observe(CheckinObserver::class);
    }
}
