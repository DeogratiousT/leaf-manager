<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\PLComponent;
use App\Models\Product;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\OrdersLaratables;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Order::class, OrdersLaratables::class);
        }

        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create',['customers'=>$customers, 'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'amount' => 'required'
        ]);

        $order = new Order;
        $order->order_number = 'ODR'.Str::random(6);
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->amount = $request->amount; 

        $order->save();

        return redirect()->route('orders.index')->with('success','Order Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plComponents = PLComponent::all();
        $units = Unit::all();
        $order = Order::find($id);
        return view('orders.show',['order'=>$order,'units'=>$units,'plComponents'=>$plComponents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $products = Product::all();
        $order = Order::find($id);
        return view('orders.edit',['order'=>$order, 'customers'=>$customers, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'amount' => 'required'
        ]));

        return redirect()->route('orders.index')->with('success','Order Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->route('orders.index')->with('success','Order Deleted');
    }
}
