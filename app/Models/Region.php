<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['region_name','county_id'];

    public function county()
    {
        return $this->belongsTo('App\Models\County');
    }

    public function stations()
    {
        return $this->hasMany('App\Models\Station');
    }

    public function stores()
    {
        return $this->hasMany('App\Models\Store');
    }
}
