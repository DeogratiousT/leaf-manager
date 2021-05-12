<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['county_code','county_name','country'];

    public function region()
    {
        return $this->hasMany('App\Models\Region');
    }

    public function farmers()
    {
        return $this->hasMany('App\Models\Farmer');
    }
}
