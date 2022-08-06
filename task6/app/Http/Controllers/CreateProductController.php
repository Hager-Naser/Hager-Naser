<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateProductController extends Controller
{
    function create_product(){
        return view('products.create');
    }
}
