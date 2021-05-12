<?php

namespace App\Http\Controllers;

use App\Models\Farminput;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\FarminputsLaratables;

class FarminputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Farminput::class, FarminputsLaratables::class);
        }

        return view('farminputs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farminputs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Farminput::create($request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]));

        return redirect()->route('farminputs.index')->with('success','Farm Input Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farminput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function show(Farminput $farminput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farminput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farminput = Farminput::find($id);
        return view('farminputs.edit',['farminput'=>$farminput]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farminput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $farminput = Farminput::find($id);

        $farminput->update($request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]));

        return redirect()->route('farminputs.index')->with('success','Farm Input Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farminput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farminput = Farminput::find($id);

        $farminput->delete();

        return redirect()->route('farminputs.index')->with('success','Farm Input Deleted');

    }
}
