<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('login'); 
});
 

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('actionLogin', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('actionRegister', [LoginController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('transactionData', [TransactionController::class, 'store'])->middleware('auth')->name('transaction.store');
Route::get('showTransaction', [TransactionController::class, 'showTransaction'])->middleware('auth')->name('transaction.show');
Route::get('/export-transactions', [TransactionController::class, 'exportPdf'])->middleware('auth')->name('transactions.export.pdf');

