<?php

namespace App\Http\Controllers\Backend\Product;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use function App\Http\Controllers\Backend\toastr;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( ProductVariantDataTable $dataTable,Product $product)
    {
        return $dataTable->with('product',$product)->render('admin.product.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.product.product-variant.create',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

}
