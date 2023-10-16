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
    private $giaoHangNhanhService;
    public function __construct(GiaoHangNhanhService $giaoHangNhanhService)
    {
        $this->giaoHangNhanhService=$giaoHangNhanhService;
    }
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
        $realAddress = $nameProvince.', ' . $nameDistrict.', '.$nameWard.($nameAddresss ? ', '.$nameAddresss: $nameAddresss);
        //getPriceOrder
        $listCart=CartService::getListCart();
        $params=[

            'shop_id'=>4579088,
            "service_type_id"=>2,
            "to_district_id"=>$idDistrict,
            "to_ward_code"=>$idWard,

            "weight"=>$listCart['weight'],

        ];
        $feeShip=$this->giaoHangNhanhService->calculatePrice('https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee', 'ward-'.$idDistrict.'service-'.$idWard,$params);
        $subtotal=$listCart['subtotal'] ;
        if(empty($subtotal))
        {
            abort(500);
        }
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
            $order['address_receiver'] = $realAddress;
            $order['sub_total'] = $subtotal;
            $order['fee_ship'] = $feeShip;
            $order['total'] = $subtotal + $feeShip;

            $order->save();
            // store order products
            $productQuantity = [];

            $cartItems=$listCart['cartList'];
            foreach ($cartItems as $cart) {
                $product=$cart['product-data'] ?? [];
                if(empty($product))
                {
                    continue;
                }
                $qty=$cart['quantity'];
                if (false&&$product->qty > $qty) {
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $product->id;
                    $orderProduct->product_name = $product->name;
                    $orderProduct->product_price = $product->price;
                    $orderProduct->qty = $qty;
                    //                    $orderProduct->variants = json_encode($productQuantity[$product->id]['variants']);
//                    $orderProduct->variant_total = json_encode($productQuantity[$product->id]['variant_total']);
//                    $orderProduct->unit_price = $productQuantity[$product->id]['unit_price'];

                    $orderProduct->save();
                    // update product quantity
                    $product->decrement('qty', $qty);
                }
                else{
                    throw ValidationException::withMessages(['Có sản phẩm đã hết hàng. Giao dịch thất bại ']);
                }
            }
            CartService::clear();

            DB::commit();

            alert('Order created!', 'We will contact you shortly to confirm your order details.');

            return Redirect::to('/');
        } catch (\Exception $ex) {
            DB::rollback();
            if($ex instanceof ValidationException)
            {
                throw ValidationException::withMessages([$ex->getMessage()]);
            }
            abort(500);
//            return Redirect::to(route('cart.index'));
        }
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
