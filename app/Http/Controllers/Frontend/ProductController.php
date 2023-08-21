<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adverisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private function getMatchValue($array, $keyMatch, $valueMatch)
    {
        foreach ($array as $key => $value) {
            if ($array->{$keyMatch} == $valueMatch) {
                return $array->{$key};
            }
        }
        return null;
    }

    public function index(Request $request)
    {
        $products = Product::where(['status' => 1]);
        $categories = Category::with(['subCategories' => function ($query) {
            $query->where('sub_categories.status', '=', '1')->with(['childCategories' => function ($query) {
                $query->where('child_categories.status', '=', '1');
            }]);
        },])
            ->where('categories.status', '=', 1)->get();
        $brands = Brand::where(['status' => 1])->get();
        if ($request->filled('childcategory')) {
            $category = ChildCategory::where(['status' => 1])->where('slug', $request->input('childcategory'))->first();

//            $category = ChildCategory::where('slug', $request->input('childcategory'))->firstOrFail();
            $products = $products->where([
                'child_category_id' => $category->id,
            ]);
        } elseif ($request->filled('subcategory')) {
            $category = SubCategory::where(['status' => 1])->where('slug', $request->input('subcategory'))->first();
//            $category = SubCategory::where('slug', $request->input('subcategory'))->firstOrFail();
            $products = $products->where([
                'sub_category_id' => $category->id,
            ]);

        } else if ($request->filled('category')) {
            $category = $categories->firstWhere('slug', $request->input('category'));
//            $category = Category::where('slug', $request->input('category', ''))->firstOrFail();
            $products = $products->where([
                'category_id' => $category->id,
            ]);
        }
        if ($request->filled('brand')) {
            $brand = Brand::where('slug', $request->input('brand'))->firstOrFail();

            $products = $products->where([
                'brand_id' => $brand->id,
            ]);
        }
        if ($request->filled('search')) {
            $products = $products->where(function ($query) use ($request) {
                $keySearch = $request->input('search');
                $query->where('name', 'like', '%' . $keySearch . '%')
                    ->orWhere('long_description', 'like', '%' . $keySearch . '%');
            });
        }
        if ($request->filled('range-min') && $request->filled('range-max')) {
            $from = $request->input('range-min');
            $to = $request->input('range-max');
            $products = $products->where('price', '>=', $from)->where('price', '<=', $to);
        }
        $products = $products->orderBy('id', 'DESC')->paginate(12);

        return view('frontend.pages.product', compact('products', 'categories', 'brands'));
    }

    /** Show product detail page */
    public function show(string $slug)
    {

        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
//        $reviews = ProductReview::where('product_id', $product->id)->where('status', 1)->paginate(10);
        if (isset($product)) {
            return view('frontend.pages.product-detail', compact('product'));

        } else abort(404);
    }

    public function chageListView(Request $request)
    {
        Session::put('product_list_style', $request->style);
    }
}
