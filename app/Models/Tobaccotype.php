<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tobaccotype extends Model
{
    protected $fillable = ['type_name']; 

    public function grades()
    {
        return $this->hasMany('App\Models\Grade');
    }
}
