<?php

namespace App\Laratables;

class PLComponentsLaratables
{
    public static function laratablesCustomAction($plComponent)
    {
        return view('plcomponents.index_action', compact('plComponent'))->render();
    }
}