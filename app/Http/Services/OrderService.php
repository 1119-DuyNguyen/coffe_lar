<?php

namespace App\Http\Services;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderService
{
    public function checkOutFormSubmit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => ['required', 'max:200'],
            'country' => ['required', 'max:200'],
            'state' => ['required', 'max:200'],
            'city' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required'],
        ]);

        $address = [];
        $address['user_id'] = Auth::user()->id;
        $address['name'] = $request->input('name');
        $address['email'] = $request->input('email');
        $address['phone'] = $request->input('phone');
        $address['country'] = $request->input('country');
        $address['state'] = $request->input('state');
        $address['city'] = $request->input('city');
        $address['zip'] = $request->input('zip');
        $address['address'] = $request->input('address');
//        $address->save();
//        $address = $address->toArray();
        if($address){
            Session::put('address', $address);
        }

    }
    public function clearSession()
    {
        \Cart::clear();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
    }
    public function storeOrder($paymentMethod, $paymentStatus, $paidAmount, $paidCurrencyName, $paidCurrencyIcon)
    {
        $listCart = \Cart::getContent();
        if (count($listCart) < 1) {
            toast()->error('Something wrong !!! You must have product in cart');
            return Redirect::to('/');
        }
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();

        if(isset($coupon)&&$coupon['discount_type'] === 'percent'){
            $coupon['discount'] = ($subTotal * $coupon['discount'] / 100);
        }
//        $productQuantity = [];
//        foreach (\Cart::getContent() as $item) {
//            $productQuantity[$item->attributes->product_id] = $item->quantity;
//        }
//        $productList = Product::whereIn('id', array_keys($productQuantity))->get();
//        foreach ($productList as $product)
//        {
//        $product->decrement('qty', $productQuantity[$product->id]);
//        }


//        dd($productQuantity,$productList);
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->sub_total =  $subTotal;
            $order->amount = getFinalPayableAmount();
            $order->currency_name = $paidCurrencyName;
            $order->currency_icon = $paidCurrencyIcon;
            $order->product_qty = \Cart::getContent()->count();
            $order->payment_method = $paymentMethod;
            $order->payment_status = $paymentStatus;
            $order->order_address = json_encode(Session::get('address'));
            $order->shpping_method = json_encode(Session::get('shipping_method'));
            $order->coupon = json_encode(Session::get('coupon'));

            $order->order_status = 'pending';
            $order->save();
            // store order products
            $productQuantity = [];

            foreach (\Cart::getContent() as $item) {
                $productQuantity[$item->attributes->product_id]['qty'] = $item->quantity;

                $productQuantity[$item->attributes->product_id]['variants'] =$item->attributes->variants ;
                $productQuantity[$item->attributes->product_id]['variant_total'] = $item->attributes->variants_total;
                $productQuantity[$item->attributes->product_id]['unit_price'] = $item->price;

            }

            $productList = Product::whereIn('id', array_keys($productQuantity))->get();
            foreach ($productList as $product) {
                if ($product->qty > $productQuantity[$product->id]['qty']) {

                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $product->id;
                    $orderProduct->product_name = $product->name;
                    $orderProduct->variants = json_encode($productQuantity[$product->id]['variants']);
                    $orderProduct->variant_total = json_encode($productQuantity[$product->id]['variant_total']);
                    $orderProduct->unit_price = $productQuantity[$product->id]['unit_price'];

                    $orderProduct->qty = $productQuantity[$product->id]['qty'];
                    $orderProduct->save();
                    // update product quantity
                    $product->decrement('qty', $productQuantity[$product->id]['qty']);
                }
            }

            if(isset($coupon))
            Coupon::findOrFail($coupon['id'])->decrement('quantity');
            DB::commit();

            $this->clearSession();
            alert('Order created!','We will contact you shortly to confirm your order details.');

            return Redirect::to('/');

        } catch (\Exception $ex) {
            DB::rollback();
            toast()->error($ex->getMessage());
//            dd($ex->getMessage());
//            return \redirect()->back();

            return Redirect::to(route('cart.index'));
        }

    }
}
