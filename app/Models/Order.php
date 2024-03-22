<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_receiver',
        'address_receiver',
        'phone_receiver',
        'email_receiver',
        'note',
        'sub_total',
        'fee_ship',
        'total',
        'payment_status',
        'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    protected static function boot()
    {
        // you MUST call the parent boot method
        parent::boot();

        static::observe(OrderObserver::class);
    }
}
