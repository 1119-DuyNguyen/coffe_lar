<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fronend\CartRequest;
use App\Http\Services\CartService;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function all()
    {
        return response(\Cart::getContent());
    }

    /** Show cart page  */
    public function index(Request $request)
    {
        $cartItems = \Cart::getContent();
        if ($request->ajax()) {
            $cart = $this->cartService->getCart();

            return response()->json(['cart' => $cart], 200);
        }


        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    /** Add item to cart */
    public function store(CartRequest $request)
    {
        // check product quantity
//        if($product->qty === 0){
//            return response(['status' => 'error', 'message' => 'Product stock out']);
//        }elseif($product->qty < $request->qty){
//            return response(['status' => 'error', 'message' => 'Quantity not available in our stock','qty' => $product->qty]);
//        }

        $this->cartService->store($request->input('id'), $request->input('qty'), $request->input('variants_items', []));


        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    /** Update product quantity */
    public function update(CartRequest $request, $idCart)
    {
        $this->cartService->update($idCart, $request->input('qty'), $request->input('variants_items', []));
        return response(
            ['status' => 'success', __("Update :resource",['resource'=> __('Cart')])]
        );
        return response(
            ['status' => 'success', __("Update :resource",['resource'=> __('Cart')]), 'product_total' => $productTotal]
        );
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
    public function destroy(Request $request, $rowId)
    {
        $this->cartService->destroy($rowId);
        $message = __("The :resource was deleted!",['resource'=> __('Cart')]);
        if ($request->ajax()) {
            return response(['status' => 'success', 'message' => $message]);
        } else {
            toast()->success($message);
            return redirect()->back();
        }
    }

//    /** Get cart count */
//    public function getCartCount()
//    {
//        return Cart::content()->count();
//    }


}
