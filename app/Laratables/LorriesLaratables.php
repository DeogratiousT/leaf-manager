<?php

namespace App\Laratables;

class LorriesLaratables
{
    public static function laratablesCustomAction($lorry)
    {
        return view('lorries.index_action', compact('lorry'))->render();
    }
}