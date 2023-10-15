<?php

namespace App\Http\Services;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class OrderService
{
    private function isInsideArrayKey($valueCheck, $keyCheck, $array)
    {
        foreach ($array as $key => $value) {
            if (isset($value[$keyCheck]) && $value[$keyCheck] == $valueCheck) {
                return true;
            }
        }
        return false;
    }

    private function getValueInsideArrayKey($valueCheck, $keyCheck,$keyValue, $array)
    {
        foreach ($array as $key => $value) {
            if (isset($value[$keyCheck]) && $value[$keyCheck] == $valueCheck) {
                return $value[$keyValue];
            }
        }
        return '';
    }

    public function checkOutFormSubmit(Request $request)
    {
        $idProvince = $request->input("province");
        $idDistrict = $request->input("district");
        $idWard = $request->input("ward");
        $dataProvince = Cache::get('province')['data'] ?? [];

        if (empty($dataProvince) || !$this->isInsideArrayKey($idProvince, 'ProvinceID', $dataProvince)) {
            throw ValidationException::withMessages(['province' => "Dữ liệu trường tỉnh/thành phố không hợp lệ "]);
        }
        $dataDistrict = Cache::get('district-' . $idProvince)['data'] ?? [];
        if (empty($dataDistrict) || !$this->isInsideArrayKey($idDistrict, 'DistrictID', $dataDistrict)) {
            throw ValidationException::withMessages(['district' => "Dữ liệu trường quận/huyện không hợp lệ"]);
        }
        $dataWard = Cache::get('ward-' . $idDistrict)['data'] ?? [];
        if (empty($dataWard) || !$this->isInsideArrayKey($idWard, 'WardCode', $dataWard)) {
            throw ValidationException::withMessages(['ward' => "Dữ liệu trường phường/xã không hợp lệ"]);
        }
        $nameProvince=$this->getValueInsideArrayKey($idProvince, 'ProvinceID','ProvinceName', $dataProvince);
        $nameDistrict=$this->getValueInsideArrayKey($idDistrict, 'DistrictID','DistrictName', $dataDistrict);
        $nameWard=$this->getValueInsideArrayKey($idWard, 'WardCode','WardName', $dataWard);
        $nameAddresss=$request->input('address','');

        DB::beginTransaction();
        try {
            $order = new Order();

            if (Auth::check()) {
                $order['user_id'] = Auth::user()->id;
            }
            // thanh toán hay chưa
            // thanh toán hay chưa
            $order['name_receiver'] = $request->input("name");
            $order['phone_receiver'] = $request->input("phone");
            $order['email_receiver'] = $request->input("email");
            $order['note'] = $request->input("note");
            $realAddress = $nameProvince.', ' . $nameDistrict.', '.$nameWard.($nameAddresss ? ', '.$nameAddresss: $nameAddresss);
            $order['address_receiver'] = $realAddress;
            $order->save();
            dd($realAddress);
            // store order products
            $productQuantity = [];

            foreach (\Cart::getContent() as $item) {
                $productQuantity[$item->attributes->product_id]['qty'] = $item->quantity;

                $productQuantity[$item->attributes->product_id]['variants'] = $item->attributes->variants;
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

            if (isset($coupon)) {
                Coupon::findOrFail($coupon['id'])->decrement('quantity');
            }
            DB::commit();

            $this->clearSession();
            alert('Order created!', 'We will contact you shortly to confirm your order details.');

            return Redirect::to('/');
        } catch (\Exception $ex) {
            DB::rollback();
            toast()->error($ex->getMessage());
            return Redirect::to(route('cart.index'));
        }
        dd($dataDistrict, $dataWard);
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

    }
}
