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

    private function getData()
    {
        $isSeed = config('services.is_seed_data');
        if ($isSeed) {
            return [
                ['product_id' => 1, 'quantity' => 4],
                ['product_id' => 2, 'quantity' => 4]
            ];
        }
        return $this->request->input('product_receipt');
    }

    public function saving(Receipt $receipt)
    {
        $productReceiptInput = $this->getData();
        if (is_array($productReceiptInput)) {
            $total = 0;
            foreach ($productReceiptInput as $input) {
                $total += $input['quantity'];
            }
            if ($receipt->total != $total) {
                throw ValidationException::withMessages(['total' => 'Số lượng sản phẩm nhập không tương ứng']);
            }
        } else {
            throw ValidationException::withMessages(['products' => 'Bạn chưa nhập sản phẩm vào phiếu nhập']);
        }
    }

    public function saved(Receipt $receipt): void
    {
        $productReceiptInput = $this->getData();
        $productList = Product::whereIn('id', array_column($productReceiptInput, 'product_id'))->get();

        $receipt->products()->sync($productReceiptInput);
        foreach ($productReceiptInput as $input) {
            $product = $productList->where('id', $input['product_id'])->first();
            $product->stock += $input['quantity'];
            $product->save();
        }
    }


}
