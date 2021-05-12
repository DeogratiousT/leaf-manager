<?php

namespace App\Laratables;

class CountiesLaratables
{
    public static function laratablesCustomAction($county)
    {
        return view('counties.index_action', compact('county'))->render();
    }
}