<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\PrintPDFTrait;

class UserOrderController extends Controller
{
    use PrintPDFTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('templates.clients.order.index');
    }
}
