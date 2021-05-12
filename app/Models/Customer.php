<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['email','mobile_number','company_name','po_box','zip_code','city','country'];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
