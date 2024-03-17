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
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }
    public function getId_ContractAttribute($value)
    {
        return $value;
    }
    public function setId_ContractAttribute($value)
    {
        $this->attributes['id_contract'] = $value;
    }
    public function getNameAttribute($value)
    {
        return $value;
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    public function getSalaryAttribute($value)
    {
        return $value;
    }
    public function setSalaryAttribute($value)
    {
        $this->attributes['salary'] = $value;
    }

    public function getAllowanceAttribute($value)
    {
        return $value;
    }
    public function setAllowanceAttribute($value)
    {
        $this->attributes['allowance'] = $value;
    }

    public function getStatusAttribute($value)
    {
        return $value;
    }
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value;
    }
}
