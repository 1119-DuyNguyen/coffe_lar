<?php

namespace App\Http\Controllers\Backend\Receipt;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\ReceiptRequest;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;

class ReceiptController extends CRUDController
{
    //
    protected function CRUDViewPath(): string
    {
        // TODO: Implement CRUDViewPath() method.
        return "admin.receipts";
    }

    protected function model(): string
    {
        // TODO: Implement model() method.
        return Receipt::class;
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.receipts";
    }

    protected function getFormElements(): array
    {
        // TODO: Implement getFormElements() method.
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "tên phiếu nhập",
            ],
            [
                'type' => 'textfield',
                'name' => "provider_name",
                'class' => "",
                'label' => "id nhà sản xuất",
            ],
            [
                'type' => 'checkbox',
                'name' => "products",
                'value' => function ($receipt) {
                    return DB::table('product_receipt')->where('receipt_id', $receipt->id)->pluck(
                        'product_id'
                    )->toArray();
                },
                'class' => "",
                'label' => "Sản phẩm",
                'optionValues' => Product::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'number',
                'name' => "quantity",
                'class' => "",
                'label' => "số lượng nhập",
            ],
        ];
    }

    protected function getFormRequest(): string
    {
        // TODO: Implement getFormRequest() method.
        return ReceiptRequest::class;
    }
}
