<?php

namespace App\Http\Controllers;

use App\Models\PLComponent;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\PLComponentsLaratables;

class PLComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(PLComponent::class, PLComponentsLaratables::class);
        }

        return view('plcomponents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plcomponents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PLComponent::create($request->validate([
            'name' => 'required',
        ]));

        return redirect()->route('production-line-components.index')->with('success','component created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PLComponent  $pLComponent
     * @return \Illuminate\Http\Response
     */
    public function show(PLComponent $pLComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PLComponent  $pLComponent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plComponent = PLComponent::find($id);
        
        return view('plcomponents.edit',['plComponent'=>$plComponent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PLComponent  $pLComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plComponent = PLComponent::find($id);

        $plComponent->update($request->validate([
            'name' => 'required',
        ]));

        return redirect()->route('production-line-components.index')->with('success','component updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PLComponent  $pLComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plComponent = PLComponent::find($id);

        $plComponent->delete();

        return redirect()->route('production-line-components.index')->with('success','component deleted');

    }
}
