<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_contract',
        'name',
        'user_id',
        'salary',
        'allowance',
        'end_date',
        'status',
        'role_id'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
