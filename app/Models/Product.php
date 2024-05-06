<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        "weight",
        "stock"
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function receipts(): BelongsToMany
    {
        return $this->belongsToMany(Receipt::class);
    }

    public function receiptProduct(): HasMany
    {
        return $this->hasMany(ProductReceipt::class);
    }

    protected static function boot()
    {
        // you MUST call the parent boot method
        // in this case the \Illuminate\Database\Eloquent\Model
        parent::boot();

        // note I am using static::observe(...) instead of Config::observe(...)
        // this way the child classes auto-register the observer to their own class
        static::observe(ProductObserver::class);
    }
}
