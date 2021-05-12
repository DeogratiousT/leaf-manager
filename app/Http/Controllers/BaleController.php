<?php

namespace App\Http\Controllers;

use App\Models\Bale;
use App\Models\Grade;
use App\Models\Farmer;
use App\Models\Balereception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $balereception = Balereception::find($id);

        $bales = Bale::where('balereception_id',$id)->get();

        return view('bales.index',['balereception'=>$balereception, 'bales'=>$bales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $balereception = Balereception::find($id);
        $grades = Grade::all();
        $farmers = Farmer::all();
        return view('bales.create',['grades'=>$grades, 'farmers'=>$farmers, 'balereception'=>$balereception]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $balereception = Balereception::find($id);

        $request->validate([
            'number' => 'required|unique:bales,number',
            'grade_id' => 'required|exists:grades,id',
            'weight_at_reception' => 'required',
            'farmer_id' => 'required',
            'state' => 'required'
        ]);

        $bale = new Bale;
        
        $bale->number = $request->number;
        $bale->grade_id = $request->grade_id;
        $bale->weight_at_reception = $request->weight_at_reception;
        $bale->farmer_id = $request->farmer_id;
        $bale->balereception_id = $id;
        $bale->state = $request->state;

        $bale->save();

        return redirect()->route('balereceptions.bales.index',$balereception)->with('success','Bale created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function show(Bale $bale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bale = Bale::find($id);

        return view('bales.edit',['bale'=>$bale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bale $bale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bale  $bale
     * @return \Illuminate\Http\Response
     */
    public function destroy($br_id ,$b_id)
    {
        $bale = Bale::find($b_id);

        $balereception = Balereception::find($br_id);
        
        $bale->delete();

        return redirect()->route('balereceptions.bales.index',$balereception)->with('success','Bale deleted');
    }
}
