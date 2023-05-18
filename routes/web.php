<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/accounts', [App\Http\Controllers\AccountController::class,'index'])->name('accounts.index');
Route::get('/accounts/{account}/transactions/create', [App\Http\Controllers\TransactionController::class,'create'])->name('transactions.create');
Route::post('/accounts/{account}/transactions', [App\Http\Controllers\TransactionController::class,'store'])->name('transactions.store');
