<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cropyear extends Model
{
    protected $fillable = ['slug_name','from_date','to_date'];

    public function farmers()
    {
        return $this->hasMany('App\Models\Farmer');
    }
}
