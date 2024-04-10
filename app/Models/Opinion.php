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
        'user_id',
        'topic',
        'content',
    ];

    public function typeOpinion(): belongsTo
    {
        return $this->belongsTo(TypeOpinion::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

}
