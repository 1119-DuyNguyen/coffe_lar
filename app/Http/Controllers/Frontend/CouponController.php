<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /** Calculate coupon discount
     */
    public function couponCalculation()
    {
        $discount=$total=0;
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if ($coupon['discount_type'] === 'amount') {
                $total = $subTotal - $coupon['discount'];
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            } elseif ($coupon['discount_type'] === 'percent') {
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
            }
        } else {
            $total = getCartTotal();
        }
        return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);

    }


    /** Apply coupon */
    public function applyCoupon(Request $request)
    {
        $coupon_code= $request->input('coupon_code');
        if($coupon_code === null){
            return response(['status' => 'error', 'message' => 'Coupon filed is required']);
        }

        $coupon = Coupon::where(['code' => $coupon_code, 'status' => 1])->first();

        if($coupon === null){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->end_date < date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon is expired']);
        }elseif($coupon->total_used >= $coupon->quantity){
            return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
        }

        if($coupon->discount_type === 'amount'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        }elseif($coupon->discount_type === 'percent'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }

        return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);
    }

//    /** Calculate coupon discount */
//    public static function couponCalculation()
//    {
//        if(Session::has('coupon')){
//            $coupon = Session::get('coupon');
//            $subTotal = getCartTotal();
//            if($coupon['discount_type'] === 'amount'){
//                $total = $subTotal - $coupon['discount'];
//                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
//            }elseif($coupon['discount_type'] === 'percent'){
//                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
//                $total = $subTotal - $discount;
//                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
//            }
//        }else {
//            $total = getCartTotal();
//            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
//        }
//    }


}
