<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fronend\CartRequest;
use App\Models\Adverisement;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
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
    public function all(){
        return response(\Cart::getContent());
    }
    /** Show cart page  */
    public function index()
    {
        $cartItems = \Cart::getContent();



        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    /** Add item to cart */
    public function store(CartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        // check product quantity
        if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock','qty' => $product->qty]);
        }

        $variants = [];
        $idVariants=['product'=>$product->id];
        $variantTotalAmount = 0;

        if($request->has('variants_items')){
            try {
                $listProductVariantItem = ProductVariantItem::with('productVariant')->whereIn('id', $request->input('variants_items',[]))->get();
                foreach($listProductVariantItem  as $variantItem){
                    $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                    $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                    $variantTotalAmount += $variantItem->price;
                    $idVariants+=[$variantItem->productVariant->name => $variantItem->id];
                }
            }
            catch (Exception $e){
                return response(['status' => 'error', 'message' => 'Something went wrong! Please try again.']);
            }
        }
        ksort($idVariants);
//        $strIdCart=$product->id.'?'.http_build_query($idVariants,'',',');
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
        $cartData['quantity'] = $request->input('qty');
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

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    /** Update product quantity */
    public function update(CartRequest $request, $idCart)
    {
        $productId = \Cart::get($idCart)->attributes->product_id;
        if(!isset($productId))
        {
            return response(['status' => 'error', 'message' => 'Something went wrong! Please try again.']);
        }

        $product = Product::findOrFail($productId);

        // check product quantity
        if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock','qty' => $product->qty]);
        }
        \Cart::update($idCart,array(
            'quantity' =>array(
                'relative' => false,
                'value' =>$request->qty
            )
        ) );
        $productTotal = $this->getProductTotal($idCart);
        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $productTotal]);
    }

    /** get product total */
    public function getProductTotal($rowId)
    {
        return getCartTotalItem($rowId);
    }

    /** get cart total amount */
    public function cartTotal()
    {
        return response(getCartTotal());
    }

    /** clear all cart products */
    public function clearCart()
    {
        \Cart::clear();

        return response(['status' => 'success', 'message' => 'Cart cleared successfully']);
    }

    /** Remove product form cart */
    public function destroy(Request $request,$rowId)
    {
        \Cart::remove($rowId);
        if($request->ajax()){
            return response(['status' => 'success', 'message' => 'Cart cleared successfully']);
        }
        else{
            toast()->success('Product removed succesfully!');
            return redirect()->back();
        }

    }

//    /** Get cart count */
//    public function getCartCount()
//    {
//        return Cart::content()->count();
//    }




}
