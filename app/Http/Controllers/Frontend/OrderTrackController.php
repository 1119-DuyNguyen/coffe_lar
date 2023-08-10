<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderTrackController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('tracker')){
            $order = Order::where('id', $request->input('tracker'))->first();
            if(empty($order))
            {
                alert("Can't find your order ","","error");
            }
            return view('frontend.pages.order-tracking', compact('order'));
        }else {
            return view('frontend.pages.order-tracking');
        }
    }

}
