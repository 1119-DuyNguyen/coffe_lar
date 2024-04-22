<?php

namespace App\Http\Controllers\Backend\Receipt;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\ReceiptRequest;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductReceipt;
use App\Models\Provider;
use App\Models\Receipt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    //
    protected function CRUDViewPath(): string
    {
        return "admin.receipts";
    }

    protected function model(): string
    {
        return Receipt::class;
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.receipts";
    }

    /**    Display a listing of the resource.
     */
    public function index()
    {
        return view($this->CRUDViewPath() . '.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        return view($this->CRUDViewPath() . '.edit', compact('receipt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->CRUDViewPath() . '.create');
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "tên phiếu nhập",
            ],
            [
                'type' => 'select',
                'name' => "products",
                'value' => function ($receipt) {
                    return ProductReceipt::where('receipt_id', $receipt->id)->pluck(
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
                'name' => "total",
                'class' => "",
                'label' => "số lượng nhập",
            ],
            [
                'type' => 'select',
                'name' => "provider_id",
                'value' => function ($receipt) {
                    return $receipt->provider_id;
                },
                'class' => "",
                'label' => "Nhà cung cấp",
                'optionValues' => Provider::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
        ];
    }

    protected function getFormRequest(): string
    {
        return ReceiptRequest::class;
    }

    public function print(string $id)
    {
        $receipt = Receipt::with('productReceipt', 'provider')->findOrFail($id);
//        return view('frontend.dashboard.order.print', compact('order'));
        $pdf = Pdf::loadView('admin.prints.receipt', compact('receipt'));
        return $pdf->stream('receipt.pdf');
    }
}
