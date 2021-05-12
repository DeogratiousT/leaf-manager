<?php

namespace App\Http\Controllers;

use App\Models\Lorry;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\LorriesLaratables;

class LorryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Lorry::class, LorriesLaratables::class);
        }

        return view('lorries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lorries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lorry::create($request->validate([
            'model' => 'required',
            'plate_number' => 'required|unique:lorries,plate_number',
        ]));

        return redirect()->route('lorries.index')->with('success','Truck Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lorry  $lorry
     * @return \Illuminate\Http\Response
     */
    public function show(Lorry $lorry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lorry  $lorry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lorry = Lorry::find($id);
        return view('lorries.edit',['lorry'=>$lorry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lorry  $lorry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lorry = Lorry::find($id);
        
        $lorry->update($request->validate([
            'model' => 'required',
            'plate_number' => 'required',
        ]));

        return redirect()->route('lorries.index')->with('success','Truck Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lorry  $lorry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lorry = Lorry::find($id);

        $lorry->delete();

        return redirect()->route('lorries.index')->with('success','Truck Deleted');

    }
}
