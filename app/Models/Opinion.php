<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_opinion_id',
        'topic',
        'content',
    ];

    public function typeOpinion(): belongsTo
    {
        return $this->belongsTo(Opinion::class);
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
