<?php

namespace App\Http\Services;

use App\Models\Product;
use App\Models\ProductVariantItem;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->loadCart();
    }

    public function getCart()
    {
        return $this->cart;
    }


    public function update($idCart,$qty,$variants_items)
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

    public function store($idProduct,$qty,$variants_items)
    {

        $product = Product::findOrFail($idProduct);
        $variants = [];
        $idVariants=['product'=>$product->id];
        $variantTotalAmount = 0;

        if(!empty($variants_items)){

                $listProductVariantItem = ProductVariantItem::with('productVariant')->whereIn('id', $variants_items)->get();
                foreach($listProductVariantItem  as $variantItem){
                    $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                    $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                    $variantTotalAmount += $variantItem->price;
                    $idVariants+=[$variantItem->productVariant->name => $variantItem->id];
                }


        }
        ksort($idVariants);
        $strIdCart= $this->generateIdCart($idVariants);

        /** check discount */
        $productPrice = 0;

        if($product->checkDiscount()){
            $productPrice = $product->offer_price;
        }else {
            $productPrice = $product->price;
        }

        $cartData = [];
        $cartData['id'] = $strIdCart;
        $cartData['name'] = $product->name;
        $cartData['quantity'] = $qty;
        $cartData['price'] = $productPrice;
        if(!isset($cartData['attributes'])){
            $cartData['attributes'] = [];
        }
        $cartData['attributes']['product_id'] = $product->id;
        $cartData['attributes']['weight'] = 10;
        $cartData['attributes']['variants'] = $variants;
        $cartData['attributes']['variants_total'] = $variantTotalAmount;
        $cartData['attributes']['image'] = $product->thumb_image;
        $cartData['attributes']['slug'] = $product->slug;

        \Cart::add($cartData);
    }
    private function generateIdCart($array) :string {
        $out ='';
        $isGenerate=false;
        foreach($array as $key => $value)
        {
            $out.= "$key-$value-";
            $isGenerate=true;
        }
        if($isGenerate){
            $out = substr($out, 0, -1);
        }

        return $out;
    }
}
