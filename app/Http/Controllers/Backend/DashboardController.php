<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function getRevenueData($selectedYear)
    {
        if (empty($selectedYear)) {
            $selectedYear = date('Y');
        }
        $revenueData = Order::selectRaw(
            'MONTH(created_at) as month,SUM(total) as revenue'
        )
            ->whereYear('created_at', $selectedYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();
        return $revenueData;
    }

    public function dashboard(Request $request)
    {
        $countProduct = Product::where('status', 1)->count();
        $countOrder = Order::whereDate('created_at', Carbon::today())->count();
        $selectedYear=$request->input('year', date('Y'));
        $revenueData=$this->getRevenueData($selectedYear);
//        $countOrder = Order::whereDate('ngaytao', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))->count();
        return view(
            'admin.dashboard',
            compact('countProduct', 'countOrder','revenueData','selectedYear')
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
