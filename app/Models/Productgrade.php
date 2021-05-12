<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productgrade extends Model
{
    protected $fillable = ['product_id','grade_id','ratio'];
}
