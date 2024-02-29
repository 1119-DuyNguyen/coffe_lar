<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function getId_ContractAttribute($value)
    {
        return $value;
    }
    public function setId_ContractAttribute($value)
    {
        $this->attributes['id_contract'] = $value;
    }

    public function getUser_idAttribute($value)
    {
        return $value;
    }
    public function setUser_idAttribute($value)
    {
        $this->attributes['name'] = $value;
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

    public function getEnd_dateAttribute($value)
    {
        return $value;
    }
    public function setEnd_dateAttribute($value)
    {
        $this->attributes['end_date'] = $value;
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
