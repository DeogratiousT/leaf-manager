<?php

namespace App\Laratables;

class RecruitmentsLaratables
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
        return ['first_name', 'middle_name', 'last_name','uuid'];
    }

    public static function laratablesQueryConditions($query)
    {
        return $query->where('cropyear_id', null);
    }
}   