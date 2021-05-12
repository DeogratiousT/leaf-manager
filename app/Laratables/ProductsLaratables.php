<?php

namespace App\Laratables;

class ProductsLaratables
{
    public static function laratablesCustomAction($product)
    {
        return view('products.index_action', compact('product'))->render();
    }
}