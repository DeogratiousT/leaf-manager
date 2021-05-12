<?php

namespace App\Http\Controllers;

use App\Models\Farmerinput;
use App\Models\Farminput;
use App\Models\Farmer;
use App\Models\Unit;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\FarmerinputsLaratables;

class FarmerinputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Farmerinput::class, FarmerinputsLaratables::class);
        }

        return view('farmerinputs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farminputs = Farminput::all();
        $farmers = Farmer::whereNotNull('cropyear_id')->get();
        $units = Unit::all();

        return view('farmerinputs.create',['farminputs'=>$farminputs, 'farmers'=>$farmers, 'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Farmerinput::create($request->validate([
            'farmer_id' => 'required',
            'farminput_id' => 'required',
            'unit_id' => 'required',
            'amount' => 'required'
        ]));

        return redirect()->route('farmerinputs.index')->with('success','Input allocated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmerinput  $farmerinput
     * @return \Illuminate\Http\Response
     */
    public function show(Farmerinput $farmerinput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmerinput  $farmerinput
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmerinput $farmerinput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmerinput  $farmerinput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmerinput $farmerinput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmerinput  $farmerinput
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmerinput = Farmerinput::find($id);

        $farmerinput->delete();

        return redirect()->route('farmerinputs.index')->with('success','Input allocation deleted');
    }
}
