<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FeaturedProduct;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::where('status', true)->get();

        //sản phẩm mới
        $productNew = $product
            ->sortByDesc('id')
            ->slice(0, 8);


        $danhmuc = Category::where('status', true)->get();



        // slide
//        $slide = Image::where('trangthai', 1)
//            ->where('loai', 'slide')
//            ->orderBy('vitri')
//            ->get();

        //banner
//        $banner = Image::where('trangthai', 1)
//            ->where('loai', 'bannerHome')
//            ->first();
        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
            'productNew' => $productNew,
//            'baiviet' => $posts,
//            'promotion' => $stack,
//            'slide' => $slide,
//            'banner' => $banner,
        ];
        return view('templates.clients.home.index', $viewData);
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

//    public function quickView(Request $request)
//    {
//        $id = $request->id;
//        if ($id) {
//            $product = Product::find($id);
//            $discount = 0;
//            if (count($product->Coupon) > 0) {
//                if ($product->Coupon[0]->loaigiam === 1) {
//                    $discount = $product->giaban *  $product->Coupon[0]->giamgia / 100;
//                } else {
//                    $discount = $product->Coupon[0]->giamgia;
//                }
//            }
//            $product->giaban = ($product->giaban - $discount < 0) ? 0 : $product->giaban - $discount;
//
//            return view('templates.clients.home.quickview', ['product' => $product]);
//        }
//    }

}
