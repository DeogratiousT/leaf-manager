<?php

namespace App\Laratables;

class CropyearsLaratables
{
    public static function laratablesCustomAction($cropyear)
    {
        return view('cropyears.index_action', compact('cropyear'))->render();
    }
}