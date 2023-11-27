<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    protected $fillable = ['user_id', "cart_items"];
    use HasFactory;

    // Accessor for 'user_id'
    public function clear()
    {
        $this->cart_items = json_encode([]);
        $this->save();
    }

    public function getCartItems()
    {

       return json_decode($this->cart_items, true) ?? [];
    }

    public function deleteCartItem($idItem)
    {
        $cartItems = json_decode($this->cart_items, true);

        unset($cartItems[$idItem]);


        $this->cart_items = json_encode($cartItems);
        $this->save();
    }

    public function saveCart($idProduct, $qty)
    {
//        $product = Product::findOrFail($idProduct);

        $productCart['id_product'] = $idProduct;

        $cartItems = $this->getCartItems();

        $productCart['quantity'] = $qty;

        $cartItems[$idProduct] = $productCart ?? [];
//            if(!empty($idOldCart))
//            {
//                unset($cartItems[$idOldCart]);
//            }
        $this->user_id = $this->user_id;
        $this->cart_items = json_encode($cartItems);
        $this->save();
    }

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
