<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\GiaoHangNhanhService;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        return $this->giaoHangNhanhService->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', 'ward-'.$idDistrict,['district_id'=>$idDistrict]);

    }

}
