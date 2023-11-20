<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'qty'
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class,'vendor_id','id');
    }

    public function product()
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

    // Mutator for 'product_id'
    public function setProductIdAttribute($value)
    {
        $this->attributes['product_id'] = $value;
    }

    // Accessor for 'product_name'
    public function getProductNameAttribute($value)
    {
        return $value;
    }

    // Mutator for 'product_name'
    public function setProductNameAttribute($value)
    {
        $this->attributes['product_name'] = $value;
    }

    // Accessor for 'product_price'
    public function getProductPriceAttribute($value)
    {
        return $value;
    }

    // Mutator for 'product_price'
    public function setProductPriceAttribute($value)
    {
        $this->attributes['product_price'] = $value;
    }

    // Accessor for 'qty'
    public function getQtyAttribute($value)
    {
        return $value;
    }

    // Mutator for 'qty'
    public function setQtyAttribute($value)
    {
        $this->attributes['qty'] = $value;
    }
}
