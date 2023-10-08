<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GiaoHangNhanhController extends Controller
{
    private $token;

    public function __construct()
    {
        $this->token = env('TOKEN_GHN');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProvince()
    {
        return $this->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/province', 'province');
    }

    public function getDistrict($idProvince)
    {
        return $this->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', 'district-'.$idProvince,['province_id'=>$idProvince]);
    }

    public function getWard($idDistrict)
    {
        return $this->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', 'ward-'.$idDistrict,['district_id'=>$idDistrict]);
    }

    private function getExternalApi($url, $nameCache, $parameter = [])
    {
        if (!Cache::has($nameCache)) {
            $response = Http::withHeader(
                'token',
                $this->token,
            )->acceptJson()->get($url, $parameter);
            if ($response->ok()) {
                $data = $response->json();
            Cache::forever($nameCache,$data);
                return response()->json(['data' => $data]);
            } else {
                return response()->json(['message' => "Lấy dữ liệu bị lỗi, hãy bấm F5"], 500);
            }
        }
        else {
            $data= Cache::get($nameCache);
            return response()->json(['data' => $data]);
        }
    }
}
