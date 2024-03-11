<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'date',
        'reality_times',
        'over_times',
        'salary',
        'total_salary'
    ];

    public function contract(): belongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
