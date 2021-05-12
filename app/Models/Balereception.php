<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balereception extends Model
{
    protected $fillable = ['station_id','store_id','number_of_bales','officer','farmer_id'];

    public function station()
    {
        return $this->belongsTo('App\Models\Station');
    }

    public function farmer()
    {
        return $this->belongsTo('App\Models\Farmer','farmer_id','id');
    }

    public function bales()
    {
        return $this->hasMany('App\Models\Bale');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
