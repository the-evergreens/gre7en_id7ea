<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $guarded    = ['photo_id', 'created_at', 'updated_at'];

    public function image()
    {
        return $this->morphTo();
    }

    public function purpose()
    {
        return $this->belongsTo('App\Models\Purpose', 'purpose_id');
    }
}
