<?php

namespace App\Laratables;

class GradesLaratables
{
    public static function laratablesCustomAction($grade)
    {
        return view('grades.index_action', compact('grade'))->render();
    }
}