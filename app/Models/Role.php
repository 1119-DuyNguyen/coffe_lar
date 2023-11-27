<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role  extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The users that belong to the role.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function permissions():BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
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

    // Accessor for 'description'
    public function getDescriptionAttribute($value)
    {
        return $value;
    }

    // Mutator for 'description'
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value;
    }
}
