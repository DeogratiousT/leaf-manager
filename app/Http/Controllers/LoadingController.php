<?php

namespace App\Http\Controllers;

use App\Models\Bale;
use App\Models\Lorry;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\LoadingsLaratables;

class LoadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Bale::class, LoadingsLaratables::class);
        }

        return view('loadings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bales = Bale::where('state','reception')->get();

        $lorries = Lorry::all();

        return view('loadings.create',['bales'=>$bales, 'lorries'=>$lorries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bale_id' => 'required|exists:bales,id',
            'lorry_id' => 'required|exists:lorries,id',
            'weight_at_loading' => 'required',
            'tdrf_number' => 'required',
        ]);

        $bale = Bale::find($request->bale_id);

        $bale->weight_at_loading = $request->weight_at_loading;
        $bale->lorry_id = $request->lorry_id;
        $bale->tdrf_number = $request->tdrf_number;
        $bale->state = 'loaded';

        $bale->save();

        return redirect()->route('loadings.index')->with('success','Bale Loaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function show(Bale $bale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function edit(Bale $bale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bale $bale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bale $bale)
    {
        //
    }
}
