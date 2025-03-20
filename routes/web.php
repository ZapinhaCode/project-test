<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('produtos', ProdutoController::class);
