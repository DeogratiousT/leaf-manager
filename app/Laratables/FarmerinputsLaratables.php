<?php

namespace App\Laratables;

class FarmerinputsLaratables
{
    public static function laratablesCustomAction($farmerinput)
    {
        return view('farmerinputs.index_action', compact('farmerinput'))->render();
    }
}   