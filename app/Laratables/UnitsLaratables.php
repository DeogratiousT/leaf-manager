<?php

namespace App\Laratables;

class UnitsLaratables
{
    public static function laratablesCustomAction($unit)
    {
        return view('units.index_action', compact('unit'))->render();
    }
}