<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\FeaturedProduct;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $featuredProducts = FeaturedProduct::where('show_at_home', 1)
            ->where('status', 1)->get();
        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();

        return view('frontend.home.home',
            compact(
                'sliders',
                'featuredProducts',
                'brands',
            )
        );


//        return view('frontend.home.home',
//            compact(
//                'sliders',
//                'flashSaleDate',
//                'flashSaleItems',
//                'popularCategory',
//                'brands',
//                'typeBaseProducts',
//                'categoryProductSliderSectionOne',
//                'categoryProductSliderSectionTwo',
//                'categoryProductSliderSectionThree',
//
//
//            ));
    }



}
