<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_code',
        'name',
        'email',
        'address',
        'password',
        'phone',
        'status',
        'tax_code',
        'bank_number',
        'gender',
        'day_of_birth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }

    public function contract()
    {
        return $this->hasMany(Contract::class);
    }

    public function latestContract()
    {
        return $this->hasOne(Contract::class)->latest();
    }

    // user with role = employee
    public static function employee(): User|\Illuminate\Database\Eloquent\Builder
    {
        return User::with('latestContract')->whereNotNull('employee_code');
    }

    // user with role = employee
    public static function buyer(): User|\Illuminate\Database\Eloquent\Builder
    {
        return User::with('latestContract')->whereNull('employee_code');
    }
}
