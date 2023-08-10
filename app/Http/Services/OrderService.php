<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Transaction;

use App\Models\UserAddress;
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

        $address = new UserAddress();
        $address->user_id = Auth::user()->id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
//        $address->save();
        $address = $address->toArray();
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
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->sub_total = getCartTotal();
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
                $productQuantity[$item->attributes->product_id] = $item->quantity;
            }

            $productList = Product::whereIn('id', array_keys($productQuantity));
            foreach ($productList as $product) {
                if ($product->qty > $productQuantity[$product->id]) {
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $product->id;
                    $orderProduct->product_name = $product->name;
                    $orderProduct->variants = json_encode($item->attributes->variants);
                    $orderProduct->variant_total = $item->attributes->variants_total;
                    $orderProduct->unit_price = $item->price;
                    $orderProduct->qty = $item->quantity;
                    // update product quantity
                    $orderProduct->save();
                    $product->decrement('qty', $item->qty);
                }
            }
            DB::commit();
            $this->clearSession();
            alert('Order created!','We will contact you shortly to confirm your order details.');
            return Redirect::to('/');

        } catch (\Exception $ex) {
            DB::rollback();
            toast()->error($ex->getMessage());
            return Redirect::to(route('cart.index'));
        }

    }
}
