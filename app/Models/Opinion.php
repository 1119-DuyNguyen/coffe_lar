<?php

namespace App\Models;

use App\Observers\CheckinObserver;
use App\Observers\MyOpinionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_opinion_id',
        'user_id',
        'topic',
        'content',
        'day_off'
    ];

    public function typeOpinion(): belongsTo
    {
        return $this->belongsTo(TypeOpinion::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        // you MUST call the parent boot method
        // in this case the \Illuminate\Database\Eloquent\Model
        parent::boot();

        // note I am using static::observe(...) instead of Config::observe(...)
        // this way the child classes auto-register the observer to their own class
        static::observe(MyOpinionObserver::class);
    }
}
