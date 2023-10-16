<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Product;
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
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cart->cart_items = json_encode([]);
            $cart->save();
        } else {
            $cartItems = Session::put('cart', []);
        }
    }

    public static function getListCart(): array
    {
        $idProduct = [];
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartItems = $cart ? json_decode($cart->cart_items, true) : [];
        } else {
            $cartItems = Session::get('cart', []);
        }
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
        foreach ($cartItems as $key => &$cart) {
            // clone data without reference
            $product = $productList->firstWhere('id', $cart['id_product']);
            if (empty($product)) {
                continue;
            }
//            $product->quantity=$cart['quantity'];
            $subtotal += ($product->price) * $cart['quantity'];
            $cart['product-data'] = $product;
//            dd($product);
            $weight += ($product->weight ?? 0);
        }
        return ['cartList' => $cartItems, 'productList' => $productList, 'weight' => $weight, 'subtotal' => $subtotal];
//        return $this->cart;
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
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstWhere(['user_id' => $user->id]);

            $cartItems = json_decode($cart->cart_items, true);

            unset($cartItems[$idCart]);


            $cart->cart_items = json_encode($cartItems);
            $cart->save();
        } else {
            $cartItems = Session::get('cart', []);
            unset($cartItems[$idCart]);

            Session::put('cart', $cartItems);
        }
    }


    public function store($idProduct, $qty, $idOldCart = '')
    {

        if ($qty < 1) {
            throw ValidationException::withMessages([__('Quantity is not valid')]);
        }
        $product = Product::findOrFail($idProduct);

        $idCart = $product->id;


        $productCart['id_product'] = $product->id;
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstOrNew(['user_id' => $user->id]);

            $cartItems = json_decode($cart->cart_items, true);
            if (isset($cartItems[$idProduct]) && empty($idOldCart)) {
                $productCart['quantity'] = $qty + $cartItems[$idProduct]['quantity'];
            } else {
                $productCart['quantity'] = $qty;
            }

            $cartItems[$idCart] = $productCart ?? [];
//            if(!empty($idOldCart))
//            {
//                unset($cartItems[$idOldCart]);
//            }
            $cart->user_id = $user->id;
            $cart->cart_items = json_encode($cartItems);
            $cart->save();
        } else {
            $cartItems = Session::get('cart', []);
            if (isset($cartItems[$idCart])) {
                $productCart['quantity'] = $qty + $cartItems[$idCart]['quantity'];
            } else {
                $productCart['quantity'] = $qty;
            }
            $cartItems[$idCart] = $productCart ?? [];
            if ($idCart != $idOldCart) {
                unset($cartItems[$idOldCart]);
            }
            Session::put('cart', $cartItems);
        }
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
