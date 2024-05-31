<?php

namespace App\Observers;

use App\Http\Services\CartService;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReport;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderObserver
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
                [
                    'product_id' => 1,
                    'quantity' => 2,
                    'price' => 6000,
                    'created_at' => '2022-07-01 06:13:54',
                    'updated_at' => '2022-07-01 06:13:54',
                ],
                [
                    'product_id' => 2,
                    'quantity' => 2,
                    'price' => 5000,
                    'created_at' => '2022-07-01 06:13:54',
                    'updated_at' => '2022-07-01 06:13:54',
                ]
            ];
        }
        $productOrder = [];
        $listCart = CartService::getListCart();

        $cartItems = $listCart['cartList'];
        foreach ($cartItems as $key => $cartItem) {
            $product = $cartItem['product-data'] ?? [];
//                if ($product->stock < $cartItem['quantity']) {
//                    throw new Exception("Sản phẩm đã hết hàng");
//                }
            // sản phẩm data lỗi hoặc hết hàng thì không ghi nhận. Chưa fix bug quantity
            if (empty($product) || ($product->stock < $cartItem['quantity'])) {
                continue;
            }
            $productOrder[] = [
                'product_id' => $product->id,
                'quantity' => $cartItem['quantity'],
                'price' => $product->price
            ];
        }
////        $request->merge(['product_order' => $cartItems]);
        return $productOrder;
    }

    public function creating(Order $order)
    {
        $productOrderInput = $this->getData();
        if (is_array($productOrderInput)) {
            $total = 0;
            $price = 0;
            foreach ($productOrderInput as $input) {
                $total += $input['quantity'];
                $price += $input['price'];
            }
            if ($order->total_quantity != $total) {
                throw ValidationException::withMessages(
                    ['data.total_quantity' => 'Số lượng sản phẩm nhập không tương ứng']
                );
            }
            if ($order->sub_total != $price) {
                throw ValidationException::withMessages(['data.total_price' => 'Giá sản phẩm nhập không tương ứng']);
            }
        } else {
            throw ValidationException::withMessages(['data.products' => 'Bạn chưa nhập sản phẩm vào đơn hàng']);
        }
    }

    public function created(Order $order): void
    {
        $productOrderInput = $this->getData();
        $productList = Product::whereIn('id', array_column($productOrderInput, 'product_id'))->get();

        $order->products()->sync($productOrderInput);

        foreach ($productOrderInput as $input) {
            $product = $productList->where('id', $input['product_id'])->first();
            $product->stock -= $input['quantity'];
            $data = [
                'product_id' => $product->id,
                'total_receipt' => 0,
                'total_sale' => $input['quantity'],
                'price_receipt' => 0,
                'price_sale' => $input['price'],
            ];
            $isSeed = config('services.is_seed_data');
            if ($isSeed) {
                $data['created_at'] = '2022-07-01 06:13:54';
                $data['updated_at'] = '2022-07-01 06:13:54';
            }
            ProductReport::create($data);
            $product->save();
        }
    }


}
