<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $id=Auth::user()->id;

        $main='info';
//        $totalOrders = Order::count();
//        $totalPendingOrders = Order::where('order_status', 'pending')->where('user_id',  $id)->count();
//        $totalCanceledOrders = Order::where('order_status', 'canceled')->where('user_id',  $id)->count();
//        $totalCompleteOrders = Order::where('order_status', 'delivered')->where('user_id',  $id)->count();


        $user=auth()->user();
        return view('templates.clients.account.index',compact('user','main'));


        return view('frontend.dashboard.dashboard', compact(

            'totalOrders',
            'totalPendingOrders',
            'totalCanceledOrders',
            'totalCompleteOrders',

        ));
//        return view('frontend.dashboard.dashboard', compact(
//            'totalOrders',
//            'totalPendingOrders',
//            'totalCompleteOrders',
//            'totalReviews',
//            'wishlist'
//        ));
    }
}
