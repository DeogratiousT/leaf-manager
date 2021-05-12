<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Region;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\CountiesLaratables;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(County::class, CountiesLaratables::class);
        }

        return view('counties.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        County::create($request->validate([
            'county_code' => 'required|unique:counties,county_code',
            'county_name' => 'required',
            'country' => 'required'
        ]));
         
        return redirect()->route('counties.index')->with('success','County created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $county = County::find($id);
        return view('counties.edit',['county'=>$county]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $county = County::find($id);
        $county->update($request->validate([
            'county_code' => 'required',
            'county_name' => 'required',
            'country' => 'required'
        ]));
         
        return redirect()->route('counties.index')->with('success','County updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $county = County::find($id);

        $county->delete();

        return redirect()->route('counties.index')->with('success','County Deleted');
    }
}
