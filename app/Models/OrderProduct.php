<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = "order_products";
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'qty'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Accessor for 'order_id'
    public function getOrderIdAttribute($value)
    {
        return $value;
    }

    // Mutator for 'order_id'
    public function setOrderIdAttribute($value)
    {
        $this->attributes['order_id'] = $value;
    }

    // Accessor for 'product_id'
    public function getProductIdAttribute($value)
    {
        return $value;
    }
}
