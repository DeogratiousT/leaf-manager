<?php

namespace App\Laratables;

class CustomersLaratables
{
    public static function laratablesCustomAction($customer)
    {
        return view('customers.index_action', compact('customer'))->render();
    }
}