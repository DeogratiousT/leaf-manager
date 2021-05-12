<?php

namespace App\Http\Controllers;

use App\Models\Bale;
use App\Models\Lorry;
use App\Models\Store;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\OffLoadingsLaratables;

class OffLoadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Bale::class, OffLoadingsLaratables::class);
        }

        return view('offloadings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bales = Bale::where('state','loaded')->get();

        $lorries = Lorry::all();

        $stores = Store::all();

        return view('offloadings.create',['bales'=>$bales, 'lorries'=>$lorries, 'stores'=>$stores]);
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
            'destination_store_id' => 'required|exists:stores,id',
            'weight_at_off_loading' => 'required',
        ]);

        $bale = Bale::find($request->bale_id);

        $bale->weight_at_off_loading = $request->weight_at_off_loading;
        $bale->destination_store_id = $request->destination_store_id;
        $bale->state = 'off-loaded';

        $bale->save();

        return redirect()->route('offloadings.index')->with('success','Bale Off Loaded');
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
