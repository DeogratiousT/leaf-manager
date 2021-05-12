<?php

namespace App\Laratables;

class FarminputsLaratables
{
    public static function laratablesCustomAction($farminput)
    {
        return view('farminputs.index_action', compact('farminput'))->render();
    }
}