<?php

namespace App\Models;

use App\Observers\ReceiptObserver;
use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receipt extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'provider_id',
        'total_price',
        'total_quantity',
    ];

    protected static function boot()
    {
        parent::boot();
        static::observe(ReceiptObserver::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function productReceipt(): HasMany
    {
        return $this->hasMany(ProductReceipt::class);
    }


}
