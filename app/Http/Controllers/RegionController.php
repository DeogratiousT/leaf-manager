<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\RegionsLaratables;
use App\Models\County;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $county = County::find($id);

        if (request()->ajax()) {
            return Laratables::recordsOf(Region::class, RegionsLaratables::class);
        }

        return view('regions.index',['county'=>$county]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(County $county)
    {
        return view('regions.create',['county'=>$county]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, County $county)
    {
        $request->validate([
            'region_name' => 'required',
        ]);

        Region::create([
            'region_name' => $request->region_name,
            'county_id' => $county->id,
        ]);
         
        return redirect()->route('counties.regions.index',['county'=>$county])->with('success','Region created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(County $county, Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county, $id)
    {
        $region = Region::find($id);
        return view('regions.edit',['county'=>$county, 'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,County $county, $id)
    {
        $region = Region::find($id);

        $request->validate([
            'region_name' => 'required',
        ]);

        $region->update([
            'region_name' => $request->region_name,
        ]);
         
        return redirect()->route('counties.regions.index',$county)->with('success','Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county, $id)
    {
        $region = Region::find($id);

        $region->delete();

        return redirect()->route('counties.regions.index',$county)->with('success','Region Deleted');
    }
}
