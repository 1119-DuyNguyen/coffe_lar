<?php

namespace App\Http\Services;

use App\Enums\VariantOption;
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
//            $idProduct[]=  intval($key);
        }
        $idProduct = array_values(array_unique($idProduct));
        if (empty($cartItems)) {
            return [];
        }

        $productList = Product::with('variants.productVariantItems')->whereIn('id', $idProduct)->get();
        $totalAmount = 0;
        foreach ($cartItems as $key => &$cart) {
            // clone data without reference
            $product =  $productList->firstWhere('id', $cart['id_product'])->replicate();
            if (empty($product)) {
                continue;
            }

            $variantTotalAmount = 0;
            $product->variants = clone $product->variants->whereIn('id', array_keys($cart['variants']));
            $product->variants->transform(function ($model) use ($cart){
                $arrayValidates = $cart['variants'][$model->id] ?? [];
                if (!is_array($arrayValidates)) {
                    $arrayValidates = [$arrayValidates];
                }
                $clone=$model->replicate();
                if(!empty($clone))
                {
                    //for purpose want to check
                    $clone->productVariantItemsOrigin=$clone->productVariantItems;
                    $clone->productVariantItems=$clone->productVariantItems->whereIn('id', $arrayValidates) ?? [];
                }
                return $clone ;
            });
            if (!empty($product->variants)) {
                $productVariants = $product->variants;
                //clone;
                foreach ($productVariants as $key => $variant) {

                  foreach ($variant->productVariantItems as $keyItem => $item) {
                        $variantTotalAmount += $item->price;

                    };
                }
            }

            $product->quantity=$cart['quantity'];
            $product->variantTotalAmount = $variantTotalAmount;
            $totalAmount += ($product->price + $variantTotalAmount) * $cart['quantity'];
            $cart['product-data'] = $product;
        }
        return ['cartList' => $cartItems, 'productList' => $productList, 'total' => $totalAmount];
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

    public function show($idCart){
        $cart=$this->findCart($idCart);
        $product=Product::with('variants.productVariantItems')->findOrFail($cart['id_product']);

        if (empty($product)) {
            return [];
        }
        $variantTotalAmount = 0;
        $productVariants = $product->variants;
        // show exist cart of product
        if (!empty($productVariants)) {
            $variants_items = $cart['variants'];
            foreach ($productVariants as $key => $variant) {
                //calculate
                foreach ($variant->productVariantItems as $key => $item) {
                    //remove unused keys
                    if (empty($variants_items[$variant->id]) || !in_array($item->id, $variants_items[$variant->id])) {
//                            dd($item->name,$variants_items,$variants_items[$variant->id],in_array($item->id,$variants_items[$variant->id]));
                        continue;
                    }
                    $arrayValidates = $variants_items[$variant->id];
                    if (!is_array($arrayValidates)) {
                        $arrayValidates = [$arrayValidates];
                    }
                    if (in_array($item->id, $arrayValidates)) {
                        $item->isHave=true;
                    };
                }
            }
        }

        return $product;
//        return $this->cart;


    }

    public function destroy($idCart)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstWhere(['user_id' => $user->id]);

            $cartItems = json_decode($cart->cart_items, true);

            unset($cartItems[$idCart]) ;


            $cart->cart_items = json_encode($cartItems);
            $cart->save();
        } else {
            $cartItems = Session::get('cart', []);
            unset($cartItems[$idCart]) ;

            Session::put('cart', $cartItems);
        }
    }

    // cart : product->variant->item->option

    public function store($idProduct, $qty, $variants_items,$idOldCart='')
    {

        if ($qty < 1) {
            throw ValidationException::withMessages([__('Quantity is not valid')]);
        }
        $product = Product::with('variants')->findOrFail($idProduct);
        $productVariants = $product->variants;

        $idCart = $product->id;
        $idVariant = [];
        $variants = [];

        // filter true data, remove fake data
        if (!empty($productVariants)) {
            foreach ($productVariants as $variant) {
                $arrayDataItems = $variants_items[$variant->id] ??[];

                if (empty($arrayDataItems)) {
                    // continue if variant dont have item
                    if ($variant->must_have == true) {
                        throw ValidationException::withMessages(['Bạn chưa chọn ' . $variant->name]);
                    } else {
                        continue;
                    }
                } else {
                    $variants[$variant->id] = [];
                }

                foreach ($variant->productVariantItems as $item) {
                    // filter fake data

                    if (!is_array($arrayDataItems)) {
                        $arrayDataItems = [$arrayDataItems];
                    }
                    if (in_array($item->id, $arrayDataItems)) {
                        $variants[$variant->id][] = $item->id;
                        if ($variant->type == VariantOption::radio) {
                            break;
                        } else {
                        }
                    };
                }
                if (!sort($variants[$variant->id])) {
                    abort(500);
                }
                $idVariant[] = '-variants-' . $variant->id . '-items-' . implode('-', $variants[$variant->id]);

            }
        }
        if (!sort($idVariant)) {
            abort(500);
        }
        $idCart .= implode($idVariant);

        $productCart['id_product'] = $product->id;
        $productCart['variants'] = $variants;
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstOrNew(['user_id' => $user->id]);

            $cartItems = json_decode($cart->cart_items, true);
            if (isset($cartItems[$idProduct])) {
                $productCart['quantity'] = $qty + $cartItems[$idProduct]['quantity'];
            } else {
                $productCart['quantity'] = $qty;
            }

            $cartItems[$idCart] = $productCart ?? [];
            if($idCart!=$idOldCart)
            {
                unset($cartItems[$idOldCart]);
            }
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
            if($idCart!=$idOldCart)
            {
                unset($cartItems[$idOldCart]);
            }
            Session::put('cart', $cartItems);
        }
    }
    public static function countCart():int{
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartItems = $cart ? json_decode($cart->cart_items, true) : [];
        } else {
            $cartItems = Session::get('cart', []);
        }
        return count($cartItems??0);

    }

}
