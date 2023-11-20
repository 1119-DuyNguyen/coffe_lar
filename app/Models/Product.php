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
        "weight"
    ];




    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Accessor for 'thumb_image'
    public function getThumbImageAttribute($value)
    {
        return $value;
    }

    // Mutator for 'thumb_image'
    public function setThumbImageAttribute($value)
    {
        $this->attributes['thumb_image'] = $value;
    }

    // Accessor for 'name'
    public function getNameAttribute($value)
    {
        return $value;
    }

    // Mutator for 'name'
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    // Accessor for 'slug'
    public function getSlugAttribute($value)
    {
        return $value;
    }

    // Mutator for 'slug'
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] =  Str::slug($value);
    }

    // Accessor for 'category_id'
    public function getCategoryIdAttribute($value)
    {
        return $value;
    }

    // Mutator for 'category_id'
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = $value;
    }

    // Accessor for 'description'
    public function getDescriptionAttribute($value)
    {
        return $value;
    }

    // Mutator for 'description'
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value;
    }

    // Accessor for 'content'
    public function getContentAttribute($value)
    {
        return $value;
    }

    // Mutator for 'content'
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $value;
    }

    // Accessor for 'price'
    public function getPriceAttribute($value)
    {
        return $value;
    }

    // Mutator for 'price'
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value;
    }

    // Accessor for 'status'
    public function getStatusAttribute($value)
    {
        return $value;
    }

    // Mutator for 'status'
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value;
    }

    // Accessor for 'weight'
    public function getWeightAttribute($value)
    {
        return $value;
    }

    // Mutator for 'weight'
    public function setWeightAttribute($value)
    {
        $this->attributes['weight'] = $value;
    }


}
