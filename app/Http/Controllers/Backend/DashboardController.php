<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $countProduct = Product::where('status', 1)->count();
        $countOrder = Order::whereDate('created_at', Carbon::today())->count();

//        $countOrder = Order::whereDate('ngaytao', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))->count();
        return view(
            'admin.dashboard',
            compact( 'countProduct', 'countOrder'),
//            compact('name_login'), ['topproduct' => json_encode($data), 'statisByYear' => json_encode($statisByYear), 'statisByDay' => json_encode($statisByDay), 'countProduct' => $countProduct, 'countOrder' => $countOrder]
        );
    }

    //old dashboard
//    public function dashboard()
//    {
//        $todaysOrder = Order::whereDate('created_at', Carbon::today())->count();
//        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
//            ->where('order_status', 'pending')->count();
//        $totalOrders = Order::count();
//        $totalPendingOrders = Order::where('order_status', 'pending')->count();
//        $totalCanceledOrders = Order::where('order_status', 'canceled')->count();
//        $totalCompleteOrders = Order::where('order_status', 'delivered')->count();
//
//        $todaysEarnings = Order::where('order_status', '!=', 'canceled')
//            ->where('payment_status', 1)
//            ->whereDate('created_at', Carbon::today())
//            ->sum('sub_total');
//
//        $monthEarnings = Order::where('order_status', '!=', 'canceled')
//            ->where('payment_status', 1)
//            ->whereMonth('created_at', Carbon::now()->month)
//            ->sum('sub_total');
//
//        $yearEarnings = Order::where('order_status', '!=', 'canceled')
//            ->where('payment_status', 1)
//            ->whereYear('created_at', Carbon::now()->year)
//            ->sum('sub_total');
//
//
//        $totalCategories = Category::count();
//
//        $totalUsers = User::count();
//
//
//        return view('admin.dashboard', compact(
//            'todaysOrder',
//            'todaysPendingOrder',
//            'totalOrders',
//            'totalPendingOrders',
//            'totalCanceledOrders',
//            'totalCompleteOrders',
//            'todaysEarnings',
//            'monthEarnings',
//            'yearEarnings',
//            'totalCategories',
//
//            'totalUsers'
//        ));
//    }

    public function login()
    {
        return view('admin.auth.login');
    }
}
