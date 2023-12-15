<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function products(){
        return view('products.products');
    }

    function checkout(){
        return view('products.checkout');
    }
}
