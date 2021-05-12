<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Region;
use App\Models\County;
use App\Models\Cropyear;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\FarmersLaratables;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Farmer::class, FarmersLaratables::class);
        }

        return view('farmers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cropyears = Cropyear::all();
        $counties = County::all();
        $regions = Region::all();
        return view('farmers.create',['counties'=>$counties, 'cropyears'=>$cropyears, 'regions'=>$regions]);
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
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required|unique:farmers,id_number',
            'mobile_number' => 'required',
            'acrerage' => 'required',
            'town' => 'required',
            'county_id' => 'required',
            'region_id' => 'required',
            'gender' => 'required',
        ]);

        Farmer::create([
            'serial' => Str::random(6),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'mobile_number' => $request->mobile_number,
            'acrerage' => $request->acrerage,
            'town' => $request->town,
            'gender' => $request->gender,
            'county_id' => $request->county_id,
            'region_id' => $request->region_id,
        ]);

        return redirect()->route('farmers.index')->with('Farmer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        $cropyears = Cropyear::all();
        $counties = County::all(); 
        return view('farmers.edit',['farmer'=>$farmer, 'counties'=>$counties, 'cropyears'=>$cropyears]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        $farmer->update($request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required',
            'mobile_number' => 'required',
            'acrerage' => 'required',
            'town' => 'required',
            'gender' => 'required',
            'county_id' => 'required',
            'region_id' => 'required'
        ]));
         
        return redirect()->route('farmers.index')->with('success','Farmer details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        $farmer->delete();

        return redirect()->route('farmers.index')->with('success','Farmer Deleted');

    }
}
