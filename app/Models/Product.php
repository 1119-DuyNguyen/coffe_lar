<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "thumb_image",
        "name",
        "slug",
        "vendor_id",
        "category_id",
        "sub_category_id",
        "child_category_id",
        "brand_id",
        "qty",
        "short_description",
        "long_description",
        "video_link",
        "sku",
        "price",
        "offer_price",
        "offer_start_date",
        "offer_end_date",
        "product_type",
        "status",
        "is_approved",
        "seo_title",
        "seo_description"
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class,'vendor_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImageGalleries()
    {
        return $this->hasMany(ProductImageGallery::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
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
