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

    public function type_opinions()
    {
        return $this->hasMany(TypeOpinion::class);
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
