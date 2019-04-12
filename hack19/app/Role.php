<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded    = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
