<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Traits\CrudTrait;


class ProductController extends Controller
{
    use CrudTrait;

    protected function model(): string
    {
        return Product::class;
    }

    protected function getFormRequest(): string
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
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if (OrderProduct::where('product_id', $product->id)->count() > 0) {
            return response(['status' => 'error', 'message' => 'This product have orders can\'t delete it.']);
        }

        /** Delte the main product image */
        $this->deleteImage($product->thumb_image);

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
