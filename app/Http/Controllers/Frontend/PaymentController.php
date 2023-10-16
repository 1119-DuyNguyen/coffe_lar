<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fronend\PaymentRequest;
use App\Http\Services\OrderService;
use App\Http\Services\SettingService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;


    }





    /** pay with cod */
    public function payWithCod(PaymentRequest $request)
    {
        $this->orderService->checkOutFormSubmit($request);


        return response()->json();



    }

}
