<?php

namespace App\Http\Controllers;

use App\Models\Tobaccotype;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\TobaccoTypesLaratables;

class TobaccotypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Tobaccotype::class, TobaccoTypesLaratables::class);
        }

        return view('tobaccotypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tobaccotypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        Tobaccotype::create($request->validate([
            'type_name' => 'required|unique:tobaccotypes,type_name'
        ]));
         
        return redirect()->route('tobaccotypes.index')->with('success','Tobacco Type created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tobaccotype  $tobaccotype
     * @return \Illuminate\Http\Response
     */
    public function show(Tobaccotype $tobaccotype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tobaccotype  $tobaccotype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tobaccotype = Tobaccotype::find($id); 
        return view('tobaccotypes.edit',['tobaccotype'=>$tobaccotype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tobaccotype  $tobaccotype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tobaccotype = Tobaccotype::find($id); 
        $tobaccotype->update($request->validate([
            'type_name' => 'required'
        ]));
         
        return redirect()->route('tobaccotypes.index')->with('success','Tobacco Type details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tobaccotype  $tobaccotype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tobaccotype = Tobaccotype::find($id);

        $tobaccotype->delete();

        return redirect()->route('tobaccotypes.index')->with('success','Tobacco Type Deleted');
    }
}
