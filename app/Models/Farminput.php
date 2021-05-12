<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farminput extends Model
{
    protected $fillable = ['name','description','quantity'];

    public function farmers()
    {
        return $this->belongsToMany('App\Models\Farmer','farmerinputs','farminput_id','farmer_id');
    }
}
