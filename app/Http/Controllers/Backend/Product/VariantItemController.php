<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VariantItemRequest;
use App\Models\ProductVariantItem;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;

class VariantItemController extends Controller
{
    use CrudTrait;
    /**
     * Store a newly created resource in storage.
     */
    protected function model(): string
    {
        return ProductVariantItem::class;
    }
    protected function getFormRequest():  string|null
    {
        return VariantItemRequest::class;
    }
}
