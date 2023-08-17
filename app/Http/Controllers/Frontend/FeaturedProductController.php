<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FeaturedProduct;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function index()
    {
        $flashSaleItems = FeaturedProduct::with('product')->where('status', 1)->orderBy('id', 'ASC')->paginate(10);
        return view('frontend.pages.featured-product', compact( 'flashSaleItems'));
    }
}
