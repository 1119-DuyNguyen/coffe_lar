<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adverisement;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\FlashSale;
use App\Models\FeaturedProduct;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;

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
