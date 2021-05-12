<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bale extends Model
{
    protected $fillable = ['number','grade_id','weight_at_reception','weight_at_loading','weight_at_off_loading','weight_at_processing','farmer_id','balereception_id','lorry_id','state','tdrf_number','creation_date','loading_date','off_loading_date','destination_store_id'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'weight_at_reception' => 'float',
        'weight_at_loading' => 'float',
        'weight_at_off_loading' => 'float',
        'weight_at_processing' => 'float',
    ];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function farmer()
    {
        return $this->belongsTo('App\Models\Farmer','farmer_id','id');
    }

    public function balereception()
    {
        return $this->belongsTo('App\Models\Balereception');
    }

    public function lorry()
    {
        return $this->belongsTo('App\Models\Lorry');
    }

    public function destinationStore()
    {
        return $this->belongsTo('App\Models\Store','destination_store_id');
    }
}
