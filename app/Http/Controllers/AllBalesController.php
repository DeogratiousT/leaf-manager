<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\AllBalesLaratables;
use App\Models\Bale;

class AllBalesController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Bale::class, AllBalesLaratables::class);
        }

        return view('bales.allbales');
    }
}
