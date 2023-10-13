<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "thumb_image",
        "name",
        "slug",
        "category_id",
        "description",
        "content",
        "price",
        "status",
    ];
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $slug = Str::slug($model->title);
            $model->slug = $slug;
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }



    /** Check if product have discount */
    public function checkDiscount(): bool
    {
        $currentDate = date('Y-m-d');

        if ($this->offer_price > 0 && $currentDate >= $this->offer_start_date && $currentDate <= $this->offer_end_date) {
            return true;
        }

        return false;
    }

}
