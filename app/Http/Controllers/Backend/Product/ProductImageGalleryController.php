<?php

namespace App\Http\Controllers\Backend\Product;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use function App\Http\Controllers\Backend\toastr;

class ProductImageGalleryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(ProductImageGalleryDataTable $dataTable, Product $product)
    {

        return $dataTable->with('product',$product)->render('admin.product.image-gallery.index', compact('product'));
    }


}
