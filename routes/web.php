<?php

use App\Http\Controllers\SupplierController;
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

Route::get('/supplier', function () {
    return view('/supplier/supplierhome');
});

Route::get('/supplier/register', function () {
    return view('/supplier/supplierRegister');
});

Route::post('/supplier/registration', [SupplierController::class, 'createUser']);

Route::get('/supplier/login', function () {
    return view('/supplier/login');
});

Route::post('/supplier/authenticate', [SupplierController::class, 'authenticate']);
