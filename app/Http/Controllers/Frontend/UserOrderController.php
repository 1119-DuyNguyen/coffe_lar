<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\PrintPDFTrait;
use Barryvdh\DomPDF\Facade\Pdf;

class UserOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('templates.clients.order.index');
    }

    public function show(string $id)
    {
        $order = Order::with('orderProducts.product')->findOrFail($id);
//        return view('frontend.dashboard.order.print', compact('order'));
        $pdf = Pdf::loadView('templates.clients.order.print', compact('order'));
        return $pdf->stream('bill.pdf');
    }
}
