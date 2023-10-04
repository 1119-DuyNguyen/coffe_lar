<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GiaoHangNhanhController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token=env('TOKEN_GHN');
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
    public function getProvince(){
        return $this->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/province',$this->token);
    }
    public function getDistrict(){
        return $this->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/district',$this->token);
    }
    public function getWard(){
        return $this->getExternalApi('https://online-gateway.ghn.vn/shiip/public-api/master-data/province',$this->token);
    }
    private function getExternalApi($url,$token,$parameter=[]){
        $response = Http::withHeader(
            'token' , $token,
        )->acceptJson()->get($url,$parameter);

        if ($response->ok()) {
            $data = $response->json();
            return response()->json(['data'=>$data]);

        } else {
            return response()->json(['message'=>"Lấy dữ liệu thành phố bị lỗi, hãy bấm F5"],500);
        }
    }
}
