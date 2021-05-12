<?php

namespace App\Laratables;

class TobaccoTypesLaratables
{
    public static function laratablesCustomAction($tobaccotype)
    {
        return view('tobaccotypes.index_action', compact('tobaccotype'))->render();
    }
}