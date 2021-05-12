<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmerinput extends Model
{
    protected $fillable = ['farmer_id','farminput_id','unit_id','amount'];

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function farmer()
    {
        return $this->belongsTo('App\Models\Farmer');
    }

    public function farminput()
    {
        return $this->belongsTo('App\Models\Farminput');
    }
}
