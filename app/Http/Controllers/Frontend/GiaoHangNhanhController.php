<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Http\Services\GiaoHangNhanhService;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GiaoHangNhanhController extends Controller
{
    private $giaoHangNhanhService;

    public function __construct(GiaoHangNhanhService $giaoHangNhanhService)
    {
        $this->giaoHangNhanhService=$giaoHangNhanhService;
    }


    public function getProvince()
    {
        return $this->giaoHangNhanhService->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/province', 'province');
    }

    public function getDistrict($idProvince)
    {
        return $this->giaoHangNhanhService->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', 'district-'.$idProvince,['province_id'=>$idProvince]);
    }

    public function getWard($idDistrict)
    {
        return $this->giaoHangNhanhService->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', 'ward-'.$idDistrict,['district_id'=>$idDistrict]);
    }
    public function getPrice(Request $request){
        $idDistrict= $request->input('idDistrict');
        $idWard= $request->input('idWard');
        $listCart=CartService::getListCart();
        if($listCart['weight']<1)
        {
            throw ValidationException::withMessages([__('Bạn chưa có sản phẩm trong giỏ hàng')]);

        }

        $params=[
//            "from_district_id"=>1454,
//            "from_ward_code"=>"21211",
            'shop_id'=>4579088,
//            "service_id"=>53320,
            "service_type_id"=>2,
            "to_district_id"=>$idDistrict,
            "to_ward_code"=>$idWard,
//            "height"=>50,
//            "length"=>20,
            "weight"=>$listCart['weight'],
//            "width"=>20,
//            "insurance_value"=>10000,
//            "cod_failed_amount"=>2000,
//            "coupon"=> null
            ];
        $feeship=$this->giaoHangNhanhService->calculatePrice('https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee', 'ward-'.$idDistrict.'service-'.$idWard,$params);
//        dd($feeShip);
        return  view('templates.clients.home.cart',compact(["feeship"]));

    }

}
