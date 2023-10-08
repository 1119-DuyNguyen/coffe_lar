<?php

namespace App\Http\Services;

use Cache;
use Illuminate\Support\Facades\Http;

class GiaoHangNhanhService
{
    private string $token;

    public function __construct()
    {
        $this->token = env('TOKEN_GHN','');
    }

    public function getExternalApi($url, $nameCache, $parameter = []): \Illuminate\Http\JsonResponse
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
    public function calculatePrice($url,$parameter){
        $response = Http::withHeader(
            'token',
            $this->token,
        )->acceptJson()->get($url, $parameter);
        if ($response->ok()) {
            $data = $response->json();
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['message' => "Lấy dữ liệu bị lỗi, hãy bấm F5"], 500);
        }
        return  view('templates.clients.home.cart');
    }
}
