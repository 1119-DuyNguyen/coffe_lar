<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
//        $products = Product::where(['status' => true]);
//        $categories = Category::where(['status' => true])->get();
//         if ($request->filled('category')) {
//            $category = $categories->firstWhere('slug', $request->input('category'));
////            $category = Category::where('slug', $request->input('category', ''))->firstOrFail();
//            $products = $products->where([
//                'category_id' => $category->id,
//            ]);
//        }
//
//        if ($request->filled('search')) {
//            $products = $products->where(function ($query) use ($request) {
//                $keySearch = $request->input('search');
//                $query->where('name', 'like', '%' . $keySearch . '%')
//                    ->orWhere('long_description', 'like', '%' . $keySearch . '%');
//            });
//        }
//        if ($request->filled('range-min') && $request->filled('range-max')) {
//            $from = $request->input('range-min');
//            $to = $request->input('range-max');
//            $products = $products->where('price', '>=', $from)->where('price', '<=', $to);
//        }
//        $products = $products->orderBy('id', 'DESC')->paginate(12);
//        $viewData = [
//            'products' => $products,
//            'categories' => $categories,
//        ];
//        if($request->ajax()){
//            return view('templates.clients.product.search', $viewData);
//        }

        return view('templates.clients.product.index');
//        return view('frontend.pages.product', compact('products', 'categories'));
    }

    /** Show product detail page */
    public function show(Request $request,string $slug)
    {
        if($request->ajax())
        {
                $product = Product::where('slug', $slug)->where('status', true)->first();

                return view('templates.clients.home.quick-view', ['product' => $product]);

        }
        $product = Product::with(['category', 'variants'])->where('slug', $slug)->where('status', 1)->first();
//        $reviews = ProductReview::where('product_id', $product->id)->where('status', 1)->paginate(10);
        if (isset($product)) {
            return view('frontend.pages.product-detail', compact('product'));

        } else abort(404);
    }

}
