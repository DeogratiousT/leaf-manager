<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmersInCropYearController extends Controller
{
    public function addFarmerToCropYear(Farmer $farmer)
    {        
        $farmer->in_crop_year = 1;

        $farmer->save();

        return redirect()->route('farmers.index')->with('success', $farmer->first_name.' '.$farmer->middle_name.' '.$farmer->last_name.' '.'has been added in to the crop year');
    }

    public function removeFarmerFromCropYear(Farmer $farmer)
    {        
        $farmer->in_crop_year = 0;

        $farmer->save();

        return redirect()->route('farmers.index')->with('success', $farmer->first_name.' '.$farmer->middle_name.' '.$farmer->last_name.' '.'has been removed from to the crop year');
    }
}
