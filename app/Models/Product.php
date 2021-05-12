<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','yield_percentage'];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function grades()
    {
        return $this->belongsToMany('App\Models\Grade','productgrades','product_id','grade_id')->withPivot('ratio');
    }
}
