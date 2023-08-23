<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
    public function payWithCod(Request $request)
    {
        $this->orderService->checkOutFormSubmit($request);
        $setting = SettingService::getGeneralSetting();

        // amount calculation
        $total = getFinalPayableAmount();
        $payableAmount = round($total, 2);


        return $this->orderService->storeOrder('COD', 0, $payableAmount, $setting->currency_name, $setting->currency_icon);



    }

}
