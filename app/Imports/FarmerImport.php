<?php

namespace App\Imports;

use App\Models\Farmer;
use App\Models\County;
use App\Models\Region;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FarmerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Farmer::create([
            'serial' => Str::random(6),
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'gender' => $row['gender'],
            'id_number' => $row['id_number'],
            'mobile_number' => $row['mobile_number'],
            'acrerage' => $row['acrerage'],
            'town' => $row['town'],
            'county_id' => County::where('county_name',$row['county'])->pluck('id')->first(),
            'region_id' => Region::where('region_name',$row['region'])->pluck('id')->first(),
        ]);
    }
}
