<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{    
    protected $fillable = [
        'serial','first_name', 'middle_name', 'last_name','id_number','mobile_number','acrerage','county_id', 'region_id', 'cropyear_id','town','gender'
    ];

    public function getRouteKeyName()
    {
        return 'serial';
    }

    public function fullname()
    {
        return $this->first_name. ' '. $this->middle_name. ' '.$this->last_name;
    }

    public function bales()
    {
        return $this->hasMany('App\Models\Bale');
    }

    public function balereceptions()
    {
        return $this->hasMany('App\Models\Balereception');
    }

    public function county()
    {
        return $this->belongsTo('App\Models\County');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function cropyear()
    {
        return $this->belongsTo('App\Models\Cropyear');
    }

    public function farmerinputs()
    {
        return $this->belongsToMany('App\Models\Farminput','farmerinputs','farmer_id','farminput_id');
    }

}
