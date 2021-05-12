<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['grade_name','tobaccotype_id'];

    public function tobaccotype()
    {
        return $this->belongsTo('App\Models\Tobaccotype');
    }

    public function bales()
    {
        return $this->hasMany('App\Models\Bale');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','productgrades');
    }
}
