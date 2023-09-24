<?php
use Illuminate\Support\Facades\Session;


/** Calculate discount percent */

function calculateDiscountPercent($originalPrice, $discountPrice) {
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return round($discountPercent);
}


/** Check the product type */

function productType($type): string
{
    switch ($type) {
        case 'new_arrival':
            return 'New';
            break;
        case 'featured_product':
            return 'Featured';
            break;
        case 'top_product':
            return 'Top';
            break;

        case 'best_product':
            return 'Best';
            break;

        default:
            return '';
            break;
    }
}

/** get total cart amount */
function getCartTotalItem($idCart){
    $total = 0;
    $cart= \Cart::get($idCart);
    $total += ( $cart->price +  $cart->attributes->variants_total) *  $cart->quantity;

    return $total;
}

function getCartTotal(){
    $total = 0;
    foreach(\Cart::getContent() as $cartItem){
        $total += ($cartItem->price + $cartItem->attributes->variants_total) * $cartItem->quantity;
    }
    return $total;
}
//
///** get payable total amount */
function getMainCartTotal(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            $total = $subTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = ($subTotal * $coupon['discount'] / 100);
            return $subTotal - $discount;
        }
    }else {
        return getCartTotal();
    }
}
//
///** get cart discount */
function getCartDiscount(){

    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
//        dd($coupon);
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            return $coupon['discount'];
        }elseif($coupon['discount_type'] === 'percent'){
            return ($subTotal * $coupon['discount'] / 100);
        }
    }else {
        return 0;
    }
}

/** get selected shipping fee from session */
function getShppingFee(){
    if(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    }else {
        return 0;
    }
}

/** get payable amount */
function getFinalPayableAmount(){
    return  getMainCartTotal() + getShppingFee();
}

/** lemit text */

function limitText($text, $limit = 20)
{
    return \Str::limit($text, $limit);
}



/**
 *
 * Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
 *
 * @access    public
 * @param    string
 * @return    string
 */

use App\Models\Materials;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('currency_format')) {

    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, '.', '.') . "{$suffix}";
        }
    }
}

if (!function_exists('getURL')) {

    function getURL()
    {
        return asset('/');
    }
}

if (!function_exists('get_user')) {
    function get_user($type, $field = 'id')
    {
//        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : "";
        return "";
    }
}

if (!function_exists('format_date')) {
    function format_date($date)
    {
        $t = Carbon::create($date)->format('d/m/Y H:i:s');
        return $t;
    }
}

if (!function_exists('toTime')) {
    function toTime($time)
    {
        Carbon::setLocale('vi');
        $dt = Carbon::create($time);
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        return $dt->diffForHumans($now);
    }
}


if (!function_exists('getNameLog')) {
    function getNameLog()
    {
        # code...
        $getIDLogin = Auth::user()->id;
        $getInfo = User::where('id', $getIDLogin)->first();
        $nameLog = $getInfo->name_staff;
        return $nameLog;
    }
}
if (!function_exists('getIdLog')) {
    function getIdLog()
    {
        # code...
//        $getIDLogin = Auth::user()->id;
//        $getInfo = User::where('id', $getIDLogin)->first();
//        return $getInfo->id;
    }
}
if (!function_exists('laydonvinl')) {
    function laydonvinl($nameMal)
    {
        $getUnit = Materials::where('name', $nameMal)->first();
        return $getUnit->don_vi_nglieu;
    }
}
