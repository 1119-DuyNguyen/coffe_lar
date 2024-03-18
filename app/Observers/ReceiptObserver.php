<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductReceipt;
use App\Models\Receipt;
use App\Models\Role;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReceiptObserver
{

    public function __construct(
        private readonly Request $request
    ) {
    }

    public function created(Receipt $receipt): void
    {
    }

    public function saved(Receipt $receipt): void
    {
        $productList = $this->request->input('products');
        $total = $receipt->total;
        $receipt_id = $receipt->id;

        $receiptProduct = ProductReceipt::create([
            'receipt_id' => $receipt_id,
            'product_id' => $productList,
            'quantity' => $total,
        ]);
//        dd($receiptProduct);
        $product_id = $receiptProduct->product_id;
        $product = Product::find($product_id);
        $product->stock += $total;
//        dd($product_stock);

        $product->save();
    }


}
