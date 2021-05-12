<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\CustomersLaratables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Customer::class, CustomersLaratables::class);
        }

        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create($request->validate([
            'email' => 'required|unique:customers,email',
            'mobile_number' => 'required',
            'company_name' => 'required|unique:customers,company_name',
            'po_box' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]));
         
        return redirect()->route('customers.index')->with('success','Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->validate([
            'email' => 'required',
            'mobile_number' => 'required',
            'company_name' => 'required',
            'po_box' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]));
         
        return redirect()->route('customers.index')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->route('customers.index')->with('success','Customer Deleted');
    }
}
