<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

// Import the Cart model
/*
 *  Chưa tối ưu khi update cart: quantity
 * */

class CartService
{

    public static function clear()
    {
        $user = User::find(Auth::user()->id);
        $user?->cart?->clear();
    }

    public static function getListCart(): array
    {
        $idProduct = [];
        // Check if the user is logged in
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);;
        } else {
            return [];
        }

        $cartItems = $user?->cart?->getCartItems() ?? [];
        foreach ($cartItems as $key => $cart) {
            $idProduct[] = $cart['id_product'];
        }
        $idProduct = array_values(array_unique($idProduct));
        if (empty($cartItems)) {
            return [];
        }

        $productList = Product::whereIn('id', $idProduct)->get();
        $subtotal = 0;
        $weight = 0;
        $totalQuantity = 0;
        foreach ($cartItems as $key => &$cart) {
            // clone data without reference
            $product = $productList->firstWhere('id', $cart['id_product']);
            if (empty($product)) {
                continue;
            }
            $product->quantity = $cart['quantity'];
            $totalQuantity += $cart['quantity'];
            $subtotal += ($product->price) * $cart['quantity'];
            $cart['product-data'] = $product;
            //            dd($product);
            $weight += ($product->weight ?? 0);
        }
        return [
            'cartList' => $cartItems,
            'productList' => $productList,
            'weight' => $weight,
            'subtotal' => $subtotal,
            'total_quantity_cart' => $totalQuantity
        ];
    }

    private function findCart($idCart)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartItems = $cart ? json_decode($cart->cart_items, true) : [];
        } else {
            $cartItems = Session::get('cart', []);
        }
        return $cartItems[$idCart] ?? [];
    }

    public function show($idCart)
    {
        $cart = $this->findCart($idCart);
        $product = Product::findOrFail($cart['id_product']);

        if (empty($product)) {
            return [];
        }
        $product->quantity = $cart['quantity'];


        return $product;
    }

    public function destroy($idCart)
    {
        // Check if the user is logged in
        $user = Auth::user();
        $cart = Cart::firstWhere(['user_id' => $user->id]);

        $cart->deleteCartItem($idCart);
    }


    public function store($idProduct, $qty, $idOldCart = '')
    {
        if ($qty < 1) {
            throw ValidationException::withMessages([__('Quantity is not valid')]);
        }


        $user = Auth::user();
        $cart = Cart::firstOrNew(['user_id' => $user->id]);
        $cartItems = $cart?->getCartItems();
        if (isset($cartItems[$idProduct]) && empty($idOldCart)) {
            $qty += $cartItems[$idProduct]['quantity'];
        }
        $cart->saveCart($idProduct, $qty);
    }

    public static function countCart(): int
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartItems = $cart ? json_decode($cart->cart_items, true) : [];
        } else {
            $cartItems = Session::get('cart', []);
        }
        return count($cartItems ?? 0);
    }
}
