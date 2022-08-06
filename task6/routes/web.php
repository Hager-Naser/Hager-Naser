<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsAllController;
use App\Http\Controllers\CreateProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('products.all',[ProductsAllController::class,'all_product'])->name('dashboard.products.all');
Route::get('products.create',[CreateProductController::class,'create_product'])->name('dashboard.products.create');
