<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;


Route::get('/', function () {
    $products = Product::with(['category','brand'])->get();
    return view('index', compact('products'));
})->name('home');

Route::get('/login',[AuthController::class,'showLogin'])->name('login');

Route::post('/login',[AuthController::class,'login'])->name('login.proses');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/product', [ProductController::class, 'index']);
