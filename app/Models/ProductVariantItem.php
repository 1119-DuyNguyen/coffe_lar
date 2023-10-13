<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'name',
        'price',
        'max_qty',
        'status'
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
