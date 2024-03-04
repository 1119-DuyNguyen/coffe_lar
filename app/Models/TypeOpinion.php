<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TypeOpinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function opinion()
    {
        return $this->hasMany(Opinion::class);
    }
    public function getNameAttribute($value)
    {
        return $value;
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
}
