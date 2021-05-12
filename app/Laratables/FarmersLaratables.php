<?php

namespace App\Laratables;

class FarmersLaratables
{
    public static function laratablesCustomAction($farmer)
    {
        return view('farmers.index_action', compact('farmer'))->render();
    }

    public static function laratablesCustomRegion($farmer)
    {
        return view('farmers.index_region', compact('farmer'))->render();
    }

    public static function laratablesCustomFullname($farmer)
    {
        return view('farmers.index_name', compact('farmer'))->render();
    }

    public static function laratablesAdditionalColumns()
    {
        return ['first_name', 'middle_name', 'last_name',];
    }

    public static function laratablesSearchFullname($query, $searchValue)
    {
        return $query->orWhere('first_name', 'like', '%'. $searchValue. '%')
                ->orWhere('middle_name', 'like', '%'. $searchValue. '%')
            ->orWhere('last_name', 'like', '%'. $searchValue. '%')
        ;
    }
}   