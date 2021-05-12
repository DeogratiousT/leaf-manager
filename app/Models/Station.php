<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
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

    public function bales()
    {
        return $this->hasManyThrough('App\Models\Bale', 'App\Models\Balereception', 'station_id', 'balereception_id', 'id', 'id');
    }
}
