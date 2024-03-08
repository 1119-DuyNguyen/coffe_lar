<?php

namespace App\Models;

use App\Observers\ReceiptObserver;
use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Receipt extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'provider_name',
    ];

    protected static function boot()
    {
        // you MUST call the parent boot method
        // in this case the \Illuminate\Database\Eloquent\Model
        parent::boot();

        // note I am using static::observe(...) instead of Config::observe(...)
        // this way the child classes auto-register the observer to their own class
        static::observe(ReceiptObserver::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }


}
