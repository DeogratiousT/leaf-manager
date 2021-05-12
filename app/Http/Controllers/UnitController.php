<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\UnitsLaratables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Unit::class, UnitsLaratables::class);
        }

        return view('units.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Unit::create($request->validate([
            'unit_name' => 'required|unique:units,unit_name',
            'type_of_measure' => 'required'
        ]));
         
        return redirect()->route('units.index')->with('success','Unit created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('units.edit',['unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->update($request->validate([
            'unit_name' => 'required',
            'type_of_measure' => 'required'
        ]));
         
        return redirect()->route('units.index')->with('success','Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);

        $unit->delete();

        return redirect()->route('units.index')->with('success','Unit Deleted');
    }
}
