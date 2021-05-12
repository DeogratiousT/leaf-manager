<?php

namespace App\Http\Controllers;

use App\Models\OrderPLComponent;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderPLComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $order = Order::find($id);

        $request->validate([
            'plcomponent_id' => 'required|exists:p_l_components,id',
            'value' => 'required|integer',
            'unit_id' => 'required|exists:units,id'
        ]);

        OrderPLComponent::create([
            'order_id' => $id,
            'plcomponent_id' => $request->plcomponent_id,
            'value' => $request->value,
            'unit_id' => $request->unit_id,
        ]);

        return redirect()->route('orders.show',['order'=>$order])->with('success','Components Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderPLComponent  $orderPLComponent
     * @return \Illuminate\Http\Response
     */
    public function show(OrderPLComponent $orderPLComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderPLComponent  $orderPLComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderPLComponent $orderPLComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderPLComponent  $orderPLComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderPLComponent $orderPLComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderPLComponent  $orderPLComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($plcid, $oplcid)
    {
        $order = Order::find($plcid);

        $orderPLComponent = OrderPLComponent::find($oplcid);

        $orderPLComponent->delete();

        return redirect()->route('orders.show',['order'=>$order])->with('success','Components Deleted');

    }
}
