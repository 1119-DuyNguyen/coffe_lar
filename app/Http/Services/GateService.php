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

class GateService
{
    static function getGateDefineFromRouteName(string $nameRoute) : string{
        $last_word_start = strrpos($nameRoute, '.') + 1; // +1 so we don't include the space in our result
        $last_word = substr($nameRoute, $last_word_start); // $last_word = PHP.

        switch ($last_word){
            case 'change-status':
            case 'edit':
                $nameRoute=substr_replace($nameRoute,'update',$last_word_start);
                break;

            case 'create':
                $nameRoute=substr_replace($nameRoute,'store',$last_word_start);
                break;

        }
        return $nameRoute;
    }
}
