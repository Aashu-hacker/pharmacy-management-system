<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register'); //

Route::get('/dashboard', function () {
    return view('index');
});

Route::post('/add-user', [AuthController::class, 'register'])->name('register');
Route::post('/user', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Category

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class,'create'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Invoice

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::post('/save-invoice', [InvoiceController::class,'saveInvoice'])->name('invoices.store');
Route::get('/invoice', [InvoiceController::class, 'list'])->name('invoices.list');
Route::get('/invoice-print/{id}', [InvoiceController::class, 'printInvoice'])->name('print-invoice');
