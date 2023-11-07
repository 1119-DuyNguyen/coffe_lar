<?php

namespace App\Traits;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
trait PrintPDFTrait {

    public function show(string $id)
    {

        $order = Order::with('orderProducts')->findOrFail($id);
//        return view('frontend.dashboard.order.print', compact('order'));
        $pdf= Pdf::loadView('frontend.dashboard.order.print', compact('order'));
        return $pdf->stream('bill.pdf');

    }
}

