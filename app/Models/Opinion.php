<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_opinion_id',
        'topic',
        'content',
    ];

    public function type_opinions()
    {
        return $this->hasMany(Opinion::class);
    }
    public function getTopicAttribute($value)
    {
        return $value;
    }
    public function setTopicAttribute($value)
    {
        $this->attributes['topic'] = $value;
    }
    public function getTypeOpinionIdAttribute($value)
    {
        return $value;
    }
    public function setTypeOpinionIdAttribute($value)
    {
        $this->attributes['type_opinion_id'] = $value;
    }
    public function getContentAttribute($value)
    {
        return $value;
    }
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $value;
    }
}
