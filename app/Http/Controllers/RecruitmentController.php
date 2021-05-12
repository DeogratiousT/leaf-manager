<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Cropyear;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\RecruitmentsLaratables;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cropyear = Cropyear::find($id);

        $farmers = Farmer::where('cropyear_id', $id)->paginate(12);

        return view('recruitments.index',['farmers'=>$farmers,'cropyear'=>$cropyear]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cropyear = Cropyear::find($id);

        if (request()->ajax()) {
            return Laratables::recordsOf(Farmer::class, RecruitmentsLaratables::class);
        }

        return view('recruitments.create',['cropyear'=>$cropyear]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cropyear = Cropyear::find($id);
        
        foreach ($request->nationalids as $nationalid) {
            Farmer::where('id_number',$nationalid)->update(['cropyear_id'=>$id]);
        }

        return redirect()->route('cropyears.recruitments.index',['cropyear'=>$cropyear])->with('success','farmers added to crop year');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $fid)
    {
        $farmer = Farmer::where('serial',$fid)->first();

        $farmer->update(['cropyear_id' => null]);

        $cropyear = Cropyear::find($id);

        return redirect()->route('cropyears.recruitments.index',['cropyear'=>$cropyear])->with('success','farmers removed from crop year');
        
    }
}
