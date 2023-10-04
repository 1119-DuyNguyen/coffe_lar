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


        return view('templates.clients.cart.index');
    }

    /** Add item to cart */
    public function store(CartRequest $request)
    {

        $this->cartService->store($request->input('product_id'), $request->input('qty'), $request->input('variants_items', []),$request->input('idOldCart',''));
        return  view('templates.clients.home.cart');
//        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }
    public function show($idCart){
        $product=$this->cartService->show($idCart);
        return  view('templates.clients.cart.showCart',['product'=>$product,'idCart'=>$idCart]);

    }



    /** Remove product form cart */
    public function destroy(Request $request, $rowId)
    {
        $this->cartService->destroy($rowId);
        return  view('templates.clients.home.cart');

    }

//    /** Get cart count */
//    public function getCartCount()
//    {
//        return Cart::content()->count();
//    }


}
