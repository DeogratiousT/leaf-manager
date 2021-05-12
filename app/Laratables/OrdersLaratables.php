<?php

namespace App\Laratables;

class OrdersLaratables
{
    public static function laratablesCustomAction($order)
    {
        return view('orders.index_action', compact('order'))->render();
    }
}