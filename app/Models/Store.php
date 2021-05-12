<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','region_id'];

    public function balereceptions()
    {
        return $this->hasMany('App\Models\Balereception');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
}
