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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use CrudTrait;
    protected function model(): string
    {
        return Product::class;
    }
    protected function addAutoInput(Request $request): array
    {
        return ['vendor_id'=>Auth::user()->id];
    }

    protected function getFormRequest():  string|null
    {
        return ProductRequest::class;
    }
    protected function getImageInput(): string|null
    {
        return 'thumb_image';
    }
    protected function getImagePath(): string|null
    {
        return 'products';
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
        return view('admin.product.create', compact('categories'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product = Product::findOrFail($id);
     $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
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
