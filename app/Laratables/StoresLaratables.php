<?php

namespace App\Laratables;

class StoresLaratables
{
    public static function laratablesCustomAction($store)
    {
        return view('stores.index_action', compact('store'))->render();
    }
}