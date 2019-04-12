<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'rating'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    //auth methods
    public function hasRole($role='')
    {
        return null !== $this->role()->where('role', $role)->first();
    }

    public function hasAnyRole($roles=[])
    {
        return null !== $this->role()->whereIn('role', $roles)->first();
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'Access Denied!');
        }
        return $this->hasRole($roles) || abort(401, 'Access Denied!');
    }

    public function positions()
    {
        return $this->hasMany('App\Models\Position');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'image');
    }
}
