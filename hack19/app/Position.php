<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	protected $guarded    = ['id', 'created_at', 'updated_at'];

	public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'image');
    }

}
