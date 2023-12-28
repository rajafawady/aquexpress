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

//Supplier Routes
Route::get('/supplier/register', function () {
    return view('/supplier/supplierRegister');
});

Route::post('/supplier/registration', [SupplierController::class, 'createUser']);

Route::get('/supplier/login', function () {
    return view('/supplier/login');
});

Route::post('/supplier/authenticate', [SupplierController::class, 'authenticate']);


Route::middleware(['auth:supplier'])->group(function () {
    Route::get('/supplier', function () {
        return view('/supplier/supplierhome');
    });
    
    Route::get('/supplier/logout',[SupplierController::class, 'logout']);
    
    Route::get('/supplier/neworders', [SupplierController::class , 'newOrders']);
    Route::get('/supplier/acceptorder/{order}', [SupplierController::class , 'acceptOrder']);
    
    Route::get('/supplier/pendingorders', [SupplierController::class , 'pendingOrders']);
    
    Route::get('/supplier/completedorders', [SupplierController::class , 'completedOrders']);
    Route::get('/supplier/completeorder/{order}', [SupplierController::class , 'completeOrder']);

    Route::get('/supplier/stats', [SupplierController::class, 'stats']);
});


//Supplier Routes Ended


//Customer Routes
Route::get('/', function () {
    return view('/customer/index');
})->name('customer.home');

Route::get('/ordernow', function () {
    return view('/customer/index');
})->name('customer.home');