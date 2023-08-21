<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\OrderDataTable;
use App\DataTables\UserOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(UserOrderDataTable $dataTable)
    {
        $statusOrder=config('order_status.order_status_admin');
        return $dataTable->render('frontend.dashboard.order.index',compact('statusOrder'));
    }

    public function show(string $id)
    {
        $order = Order::with('orderProducts.vendor')->findOrFail($id);
        $address = json_decode($order->order_address);
        $shipping = json_decode($order->shpping_method);
        $coupon = json_decode($order->coupon);
        $pdf= Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])->loadView('frontend.dashboard.order.print', compact('order','address','coupon'));
        return $pdf->stream('bill.pdf');
        return view('frontend.dashboard.order.show', compact('order'));
    }
}
