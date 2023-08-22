<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VariantRequest;
use App\Models\ProductVariant;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;

class VariantController extends Controller
{
    use CrudTrait;
    /**
     * Store a newly created resource in storage.
     */
    protected function model(): string
    {
        return ProductVariant::class;
    }
    protected function getFormRequest(): FormRequest
    {
        return new VariantRequest();
    }
}
