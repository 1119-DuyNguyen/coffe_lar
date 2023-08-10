<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $id=Auth::user()->id;
        $totalOrder = Order::where('user_id',  $id)->count();
        $totalPendingOrders = Order::where('user_id',  $id)
            ->where('order_status', 'pending')->count();
        $totalCompleteOrders  = Order::where('user_id',  $id)
        ->where('order_status', 'delivered')->count();
        $totalReviews = ProductReview::where('user_id',  $id)->count();
        $wishlist = Wishlist::where('user_id',  $id)->count();

        return view('admin.user.dashboard', compact(
            'totalOrder',
            'totalPendingOrders',
            'totalCompleteOrders',
            'totalReviews',
            'wishlist'
        ));
    }
}
