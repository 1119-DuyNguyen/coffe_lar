<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'status'
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

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }


    // Accessor for 'name'
    public function getNameAttribute($value)
    {
        return $value;
    }

    // Mutator for 'name'
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    // Accessor for 'email'
    public function getEmailAttribute($value)
    {
        return $value;
    }

    // Mutator for 'email'
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value;
    }

    // Accessor for 'phone'
    public function getPhoneAttribute($value)
    {
        return $value;
    }

    // Mutator for 'phone'
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = $value;
    }

    // Accessor for 'role_id'
    public function getRoleIdAttribute($value)
    {
        return $value;
    }

    // Mutator for 'role_id'
    public function setRoleIdAttribute($value)
    {
        $this->attributes['role_id'] = $value;
    }

    // Accessor for 'status'
    public function getStatusAttribute($value)
    {
        return $value;
    }

    // Mutator for 'status'
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value;
    }

}
