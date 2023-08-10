<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use App\Models\CodSetting;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaypalSetting;
use App\Models\Product;
use App\Models\RazorpaySetting;
use App\Models\StripeSetting;
use App\Models\Transaction;
use App\Traits\PaypalTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Charge;
use Stripe\Stripe;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;


    }

    public function index()
    {
//        if(!Session::has('address')){
//            return redirect()->route('user.checkout');
//        }
        return view('frontend.pages.payment');
    }



    /** pay with cod */
    public function payWithCod(Request $request)
    {
        $this->orderService->checkOutFormSubmit($request);
        $setting = GeneralSetting::first();

        // amount calculation
        $total = getFinalPayableAmount();
        $payableAmount = round($total, 2);


        return $this->orderService->storeOrder('COD', 0, $payableAmount, $setting->currency_name, $setting->currency_icon);



    }

}
