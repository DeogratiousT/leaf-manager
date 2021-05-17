<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Region;
use App\Models\Grade;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\StationsLaratables;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $stations = Station::all();

        if (request()->ajax()) {
            return Laratables::recordsOf(Station::class, StationsLaratables::class);
        }

        return view('stations.index',['stations'=>$stations, 'grades'=>$grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();

        return view('stations.create',['regions'=>$regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Station::create($request->validate([
            'name' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]));

        return redirect()->route('stations.index')->with('success','Market Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        $regions = Region::all();

        return view('stations.edit',['station'=>$station, 'regions'=>$regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        $station->update($request->validate([
            'name' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]));

        return redirect()->route('stations.index')->with('success','Market Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->delete();

        return redirect()->route('stations.index')->with('success','Market Deleted');

    }
}
