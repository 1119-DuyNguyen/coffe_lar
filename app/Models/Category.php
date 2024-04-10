<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'slug'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
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

    // Accessor for 'icon'
    public function getIconAttribute($value)
    {
        return $value;
    }

    // Mutator for 'icon'
    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = $value;
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

    // Accessor for 'slug'
    public function getSlugAttribute($value)
    {
        return $value;
    }

    // Mutator for 'slug'
    public function setSlugAttribute($value)
    {
//        $this->attributes['slug'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


}
