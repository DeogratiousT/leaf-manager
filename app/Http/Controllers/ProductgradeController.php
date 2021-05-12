<?php

namespace App\Http\Controllers;

use App\Models\Productgrade;
use App\Models\Product;
use App\Models\Grade;
use Illuminate\Http\Request;

class ProductgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $product = Product::find($id);

        $productgrades = Productgrade::where('product_id', $id)->get();

        return view('productgrades.index',['productgrades'=>$productgrades, 'product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        $grades = Grade::all();
        return view('productgrades.create',['product'=>$product, 'grades'=>$grades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $product = Product::find($id);

        // $ratios = Productgrade::where('product_name',$request->product_name)->pluck('ratio');

        // $rtotal = 0;

        // foreach ($ratios as $ratio) {
        //     $rtotal+=$ratio;
        // }

        // if ($rtotal >100) {
            
        // }


        $request->validate([
            'grade_id' => 'required|exists:grades,id',
            'ratio' => 'required|integer|min:0|max:100',
        ]);

        $productgrade = new Productgrade;

        $productgrade->product_id = $id;
        $productgrade->grade_id = $request->grade_id;
        $productgrade->ratio = $request->ratio;

        $productgrade->save();

        return redirect()->route('products.grades.index',$product)->with('success', 'Product grade created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productgrade  $productgrade
     * @return \Illuminate\Http\Response
     */
    public function show(Productgrade $productgrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productgrade  $productgrade
     * @return \Illuminate\Http\Response
     */
    public function edit(Productgrade $productgrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productgrade  $productgrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productgrade $productgrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productgrade  $productgrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($product, $grade)
    {
        $product = Product::find($product)->first();

        $productgrade = Productgrade::find($grade);

        $productgrade->delete();

        return redirect()->route('products.grades.index',$product)->with('success','Product Grade Deleted');
    }
}
