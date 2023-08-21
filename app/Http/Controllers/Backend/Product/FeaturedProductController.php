<?php

namespace App\Http\Controllers\Backend\Product;

use App\DataTables\FeaturedProductDataTable;
use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FeaturedProduct;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function index(FeaturedProductDataTable $dataTable)
    {

        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return $dataTable->render('admin.featured-product.index', compact( 'products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product' => ['required', 'unique:featured_products,product_id'],
            'show_at_home' => ['required'],
            'status' => ['required'],
        ],[
            'product.unique' => 'The product is already in flash sale!'
        ]);


        $flashSaleItem = new FeaturedProduct();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();
        toast()->success('Product Added Successfully!');


        return redirect()->back();

    }

    public function changeShowAtHomeStatus(Request $request)
    {
        $flashSaleItem = FeaturedProduct::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been updated!']);
    }

    public function changeStatus(Request $request)
    {
        $flashSaleItem = FeaturedProduct::findOrFail($request->id);
        $flashSaleItem->status = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been updated!']);
    }

    public function destroy(string $id)
    {
        $flashSaleItem = FeaturedProduct::findOrFail($id);
        $flashSaleItem->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
