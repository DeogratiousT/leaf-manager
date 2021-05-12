<?php

namespace App\Laratables;

class StationsLaratables
{
    public static function laratablesCustomAction($station)
    {
        return view('stations.index_action', compact('station'))->render();
    }
}