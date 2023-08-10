<?php

namespace App\Http\Controllers\Backend\Product;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Str;

class ProductController extends Controller
{
    use CrudTrait;
    protected function model(): string
    {
        return Product::class;
    }
    protected function addAutoInput(): array
    {
        return ['vendor_id'=>Auth::user()->vendor->id];
    }

    protected function getFormRequest(): FormRequest
    {
        return new ProductRequest();
    }
    protected function getImageInput(): string|null
    {
        return 'thumb_image';
    }
    protected function getInputSlug(): string
    {
        return 'name';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product = Product::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'subCategories', 'childCategories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if(OrderProduct::where('product_id',$product->id)->count() > 0){
            return response(['status' => 'error', 'message' => 'This product have orders can\'t delete it.']);
        }

        /** Delte the main product image */
        $this->deleteImage($product->thumb_image);

        /** Delete product gallery images */
        $galleryImages = ProductImageGallery::where('product_id', $product->id)->get();
        foreach($galleryImages as $image){
            $this->deleteImage($image->image);
            $image->delete();
        }

        /** Delete product variants if exist */
        $variants = ProductVariant::where('product_id', $product->id)->get();

        foreach($variants as $variant){
            $variant->productVariantItems()->delete();
            $variant->delete();
        }

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }




}
