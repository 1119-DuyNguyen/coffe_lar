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
    private function statisByMonthy1($month)
    {
        $nowYear = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $moneySale = 0;
        $moneyBuyMaterial = 0;
        //        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
//            ->where('order_status', 'pending')->count();
        $getSaleByMonth = Sale_statisticals::whereYear('ngay_ban', $nowYear)->whereMonth('ngay_ban', $month)->get();
        $getUseMaterialByMonth = ManagerMaterialUse::whereYear('ngay_tong_ket', $nowYear)->whereMonth('ngay_tong_ket', $month)->get();
        if ($getSaleByMonth->count() > 0) {
            foreach ($getSaleByMonth as $val) {
                $moneySale += $val->tien_don_hang;
            }
            if ($getUseMaterialByMonth->count() > 0) {
                foreach ($getUseMaterialByMonth as $val) {
                    $moneyBuyMaterial += $val->so_luong * $val->don_gia;
                }
            } else {
                $moneyBuyMaterial += 0;
            }
            $turnoverMonth = $moneySale - $moneyBuyMaterial;
            return $turnoverMonth;
        }
        return 0;
    }
    public function dashboard()
    {
        $
//        $nowMonth = Carbon::now('Asia/Ho_Chi_Minh')->month;
//        $nowYear = Carbon::now('Asia/Ho_Chi_Minh')->year;
//        $nowday = Carbon::now('Asia/Ho_Chi_Minh')->day;
//        $statisByYear = array();
//        $statisByDay = array();
//        $datadays = null;
//        for ($i = 1; $i < 13; $i++) {
//            $month = 'Tháng ' . $i;
//            $data['name'] = $month;
//            $data['y'] = null;
//            $data['drilldown'] = $i;
//            if ($nowMonth >= $i) {
//                $d = $this->statisByMonthy1($i);
//                $data['y'] = $d;
//                $datadays['data'] = array();
//                // lay thong ke theo tung ngay
//                $days = Carbon::createFromDate($nowYear, $i)->daysInMonth;
//                for ($j = 1; $j <= $days; $j++) {
//                    $day = 'Ngày ' . $j . '/' . $i . '/' . $nowYear;
//                    if ($i <= $nowMonth) {
//                        if ($i === $nowMonth && $j > $nowday) {
//                            array_push($datadays['data'], [$day, null]);
//                        } else {
//                            array_push($datadays['data'], [$day, $this->statisByDay($i, $j)]);
//                        }
//                    } else {
//                        array_push($datadays['data'], [$day, null]);
//                    }
//                }
//            }
//            $datadays['name'] = $data['name'] = $month;
//            $datadays['id'] = $i;
//            array_push($statisByYear, $data);
//            array_push($statisByDay, $datadays);
//            $datadays = array();
//        }
//        $nameOrder = DB::select(
//            "SELECT id_san_pham_order,so_luot_dat FROM order_statisticals ORDER BY so_luot_dat DESC LIMIT 5"
//        );
//        $data = [];
//        for ($i = 0; $i < count($nameOrder); $i++) {
//            $nameP = DB::select("SELECT tensp FROM products WHERE id=" . $nameOrder[$i]->id_san_pham_order);
//
//            $value['name'] = $nameP[0]->tensp;
//            $value['y'] = $nameOrder[$i]->so_luot_dat;
//            array_push($data, $value);
//        }
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
