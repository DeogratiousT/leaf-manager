<?php

namespace App\Laratables;

class UsersLaratables
{
    public static function laratablesCustomAction($user)
    {
        return view('users.index_action', compact('user'))->render();
    }
}