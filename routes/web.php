<?php

use Illuminate\Support\Facades\Route;
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
    return view('home');
});
Route::get('/client', [\App\Http\Controllers\ClientController::class, 'index'])->name('client');
Route::get('/client-add', [\App\Http\Controllers\ClientController::class, 'create']);
Route::get('/transaction-add', [\App\Http\Controllers\TransactionController::class, 'create']);
Route::get('/transaction-show', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaction-show');
Route::post('/order-data', [\App\Http\Controllers\ClientController::class, 'order']);
Route::post('/client-store', [\App\Http\Controllers\ClientController::class, 'store'])->name('client-store');
Route::post('/transaction-store', [\App\Http\Controllers\TransactionController::class, 'store'])->name('transaction-store');
