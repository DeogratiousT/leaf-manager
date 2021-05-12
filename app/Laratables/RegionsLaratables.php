<?php

namespace App\Laratables;

class RegionsLaratables
{
    public static function laratablesCustomAction($region)
    {
        return view('regions.index_action', compact('region'))->render();
    }
}