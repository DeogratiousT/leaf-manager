<?php

namespace App\Laratables;

class OffLoadingsLaratables
{
    public static function laratablesCustomStore($bale)
    {
        return view('loadings.index_store', compact('bale'))->render();
    }

    public static function laratablesCustomMarket($bale)
    {
        return view('loadings.index_market', compact('bale'))->render();
    }

    public static function laratablesCustomState($bale)
    {
        return view('loadings.index_status', compact('bale'))->render();
    }

    public static function laratablesAdditionalColumns()
    {
        return ['balereception_id','state'];
    }

    public static function laratablesQueryConditions($query)
    {
        return $query->where('state', 'off-loaded');
    }
}