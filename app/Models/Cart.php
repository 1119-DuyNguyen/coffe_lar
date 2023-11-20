<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['user_id',"cart_items"];
    use HasFactory;
    // Accessor for 'user_id'
    public function getUserIdAttribute($value)
    {
        return $value;
    }

    // Mutator for 'user_id'
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $value;
    }

    // Accessor for 'cart_items'
    public function getCartItemsAttribute($value)
    {
        return $value;
    }

    // Mutator for 'cart_items'
    public function setCartItemsAttribute($value)
    {
        $this->attributes['cart_items'] = $value;
    }
}
