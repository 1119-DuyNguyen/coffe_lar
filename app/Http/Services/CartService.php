<?php

namespace App\Http\Services;

use App\Enums\VariantOption;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Validation\ValidationException;
use App\Cart;

// Import the Cart model

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->loadCart();
    }

    public static function getListCart()
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartItems = $cart ? json_decode($cart->cart_items, true) : [];
        } else {
            $cartItems = Session::get('cart', []);
        }
        if (empty($cartItems)) {
            return [];
        }
        $productList = Product::with('variants.productVariantItems')->whereIn('id', array_keys($cartItems))->get();
        $totalAmount = 0;
        foreach ($productList as $product) {
            $variantTotalAmount = 0;
            $productVariants = $product->variants;
            $productCart = $cartItems[$product->id];
            if (!empty($productVariants)) {
                $variants_items = $productCart['variants'];
                foreach ($productVariants as $key => $variant) {
                    //calculate
                    foreach ($variant->productVariantItems as $key => $item) {
                        //remove unused keys
                        if (empty($variants_items[$variant->id]) || !in_array($item->id,$variants_items[$variant->id])) {
//                            dd($item->name,$variants_items,$variants_items[$variant->id],in_array($item->id,$variants_items[$variant->id]));
                            $variant->productVariantItems->forget($key);
                            continue;

                        }
                        $arrayValidates = $variants_items[$variant->id];
                        if (!is_array($arrayValidates)) {
                            $arrayValidates = [$arrayValidates];
                        }
                        if (in_array($item->id, $arrayValidates)) {
//                                $variants[$variant->id][] = $item;
                            $variantTotalAmount += $item->price;


                        };
                    }
                }
            }
            $product->quantity = $productCart['quantity'];
            $product->variantTotalAmount = $variantTotalAmount;
            $totalAmount += ($product->price + $variantTotalAmount) * $product->quantity;
        }
        return ['productList' => $productList, 'total' => $totalAmount];
//        return $this->cart;
    }


    public function update($idCart, $qty, $variants_items)
    {
        $productId = \Cart::get($idCart)->attributes->product_id;
        if (!isset($productId)) {
            return response(['status' => 'error', 'message' => 'Something went wrong! Please try again.']);
        }

//        $product = Product::findOrFail($productId);
        // check product quantity
//        if ($product->qty === 0) {
//            return response(['status' => 'error', 'message' => 'Product stock out']);
//        } elseif ($product->qty < $request->qty) {
//            return response(
//                ['status' => 'error', 'message' => 'Quantity not available in our stock', 'qty' => $product->qty]
//            );
//        }
        \Cart::update($idCart, array(
            'quantity' => array(
                'relative' => false,
                'value' => $qty
            )
        ));
//        $productTotal = $this->getProductTotal($idCart);

    }

    public function destroy($idCart)
    {
        \Cart::remove($idCart);
    }

    protected function loadCart()
    {
        if (Auth::check()) {
            // User is authenticated, load cart data from the database
            $user = Auth::user();
            $this->cart = $user->cart ?? [];
        } else {
            // User is a guest, load cart data from the session or initialize an empty cart
            $this->cart = Session::get('cart', []);
        }
    }

    public function store($idProduct, $qty, $variants_items)
    {

        //        if($product->qty === 0){
//            return response(['status' => 'error', 'message' => 'Product stock out']);
//        }elseif($product->qty < $request->qty){
//            return response(['status' => 'error', 'message' => 'Quantity not available in our stock','qty' => $product->qty]);
//        }
        if ($qty < 1) {
            throw ValidationException::withMessages(['Số lượng sản phẩm không hợp lệ']);
        }
        $product = Product::with('variants')->findOrFail($idProduct);
        $productVariants = $product->variants;
        $productCart = ['quantity' => $qty];
        $variants = [];
        // filter true data, remove fake data
        if (!empty($productVariants)) {
            foreach ($productVariants as $variant) {
                if (empty($variants_items[$variant->id])) {
                    if ($variant->must_have = true) {
                        throw ValidationException::withMessages(['Bạn chưa chọn ' . $variant->name]);
                    }
                } else {
                    $variants[$variant->id] = [];
                }
                foreach ($variant->productVariantItems as $item) {
                    $arrayValidates = $variants_items[$variant->id];
                    if (!is_array($arrayValidates)) {
                        $arrayValidates = [$arrayValidates];
                    }
                    if (in_array($item->id, $arrayValidates)) {
                        $variants[$variant->id][] = $item->id;
                        if ($variant->type == VariantOption::radio) {
                            break;
                        }
                    };
                }
            }
        }
        $productCart['variants'] = $variants;
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstOrNew(['user_id' => $user->id]);
            $cartItems = json_decode($cart->cart_items, true);

            $cartItems[$idProduct] = $productCart ?? [];
            $cart->user_id = $user->id;
            $cart->cart_items = json_encode($cartItems);
            $cart->save();
        } else {
            $cart = Session::get('cart', []);
            $cart[$idProduct] = $productCart ?? [];

            Session::put('cart', $cart);
        }
    }

}
