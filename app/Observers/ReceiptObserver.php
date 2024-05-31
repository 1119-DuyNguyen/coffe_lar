<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductReport;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            $seedData = [];
            for ($i = 1; $i <= 30; ++$i) {
                $randomDay = Carbon::now()->subYears(rand(1, 10));
                $seedData[] = [
                    'product_id' => $i,
                    'quantity' => 4,
                    'price' => 9000,
                    'created_at' => $randomDay,
                    'updated_at' => $randomDay
                ];
            }
            return $seedData;
//            return [
//                ['product_id' => 1, 'quantity' => 4, 'price' => 9000],
//                ['product_id' => 2, 'quantity' => 4, 'price' => 10000]
//            ];
        }
        return $this->request->input('product_receipt');
    }

    public function saving(Receipt $receipt)
    {
        $productReceiptInput = $this->getData();
        if (is_array($productReceiptInput)) {
            $total = 0;
            $price = 0;
            foreach ($productReceiptInput as $input) {
                $total += $input['quantity'];
                $price += $input['price'];
            }
            if ($receipt->total_quantity != $total) {
                throw ValidationException::withMessages(
                    ['data.total_quantity' => 'Số lượng sản phẩm nhập không tương ứng']
                );
            }
            if ($receipt->total_price != $price) {
                throw ValidationException::withMessages(['data.total_price' => 'Giá sản phẩm nhập không tương ứng']);
            }
        } else {
            throw ValidationException::withMessages(['data.products' => 'Bạn chưa nhập sản phẩm vào phiếu nhập']);
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
            ProductReport::create([
                'product_id' => $product->id,
                'total_receipt' => $input['quantity'],
                'total_sale' => 0,
                'price_receipt' => $input['price'],
                'price_sale' => 0
            ]);
            $product->save();
        }
    }


}
