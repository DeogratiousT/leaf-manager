<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Region;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\StoresLaratables;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Store::class, StoresLaratables::class);
        }

        return view('stores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('stores.create',['regions'=>$regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Store::create($request->validate([
            'name' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]));

        return redirect()->route('stores.index')->with('store created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regions = Region::all();
        $store = Store::find($id);

        return view('stores.edit',['store'=>$store, 'regions'=>$regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $store = Store::find($id);

        $store->update($request->validate([
            'name' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]));

        return redirect()->route('stores.index')->with('store updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        
        $store->delete();

        return redirect()->route('stores.index')->with('store deleted successfully');

    }
}
