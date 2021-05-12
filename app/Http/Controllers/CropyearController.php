<?php

namespace App\Http\Controllers;

use App\Models\Cropyear;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\CropyearsLaratables;
use Illuminate\Support\Carbon;

class CropyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Cropyear::class, CropyearsLaratables::class);
        }

        return view('cropyears.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cropyears.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cropyear::create($request->validate([
            'slug_name' => 'required',
            'to_date' => 'required',
            'from_date' => 'required'
        ]));

        return redirect()->route('cropyears.index')->with('success','Crop Year Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cropyear  $cropyear
     * @return \Illuminate\Http\Response
     */
    public function show(Cropyear $cropyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cropyear  $cropyear
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cropyear = Cropyear::find($id);

        return view('cropyears.edit',['cropyear'=>$cropyear]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cropyear  $cropyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cropyear = Cropyear::find($id);
        
        $cropyear->update($request->validate([
            'slug_name' => 'required',
            'to_date' => 'nullable',
            'from_date' => 'nullable'
        ]));

        return redirect()->route('cropyears.index')->with('success','Crop Year Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cropyear  $cropyear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cropyear = Cropyear::find($id);

        $cropyear->delete();
        
        return redirect()->route('cropyears.index')->with('success','Crop Year Deleted Successfully');

    }
}
