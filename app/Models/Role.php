<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
enum RoleID:int
{
case Admin=1;
case User=2;
case staff=3;
}
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
        'is_employee'
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

}
