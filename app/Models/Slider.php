<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "title",
        "starting_price",
        "btn_url",
        "serial",
        "status",
        "banner"
    ];
}
