<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.checkout');
    }



}
