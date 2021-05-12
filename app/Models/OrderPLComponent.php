<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPLComponent extends Model
{
    protected $fillable = ['order_id','plcomponent_id','value','unit_id'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function plcomponent()
    {
        return $this->belongsTo('App\Models\PLComponent','plcomponent_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }
}
