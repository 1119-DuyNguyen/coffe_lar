<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSaleItem extends Model
{
    use HasFactory;
    protected $fillable=['id','flash_sale_id','status','show_at_home'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
