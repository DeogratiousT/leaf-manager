<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Farmer;
use App\Models\Grade;
use App\Models\Product;
use App\Models\Tobaccotype;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::count();
        $orders = Order::count();
        $farmers = Farmer::count();
        $grades = Grade::count();
        $products = Product::count();
        $tobaccotypes = Tobaccotype::count();

        return view('home', [
            'customers' => $customers,
            'orders' => $orders,
            'farmers' => $farmers,
            'grades' => $grades,
            'products' => $products,
            'tobaccotypes' => $tobaccotypes
        ]);
    }
}
