<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number','customer_id','product_id','amount','final_weight'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function orderplcomponents()
    {
        return $this->hasMany('App\Models\OrderPLComponent');
    }
}
