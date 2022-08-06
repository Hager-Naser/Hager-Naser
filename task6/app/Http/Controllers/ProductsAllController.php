<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductsAllController extends Controller
{
    function all_product(){
        $products = DB::table('products')->get();
        return view('products.all' , compact('products'));
    }
}
