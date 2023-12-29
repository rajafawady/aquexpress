<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;

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


Route::prefix('supplier')->group(function () {

    // Supplier Registration
    Route::get('/register', [SupplierController::class, 'showRegistrationForm']);
    Route::post('/registration', [SupplierController::class, 'createUser']);

    // Supplier Login
    Route::get('/login', [SupplierController::class, 'showLoginForm'])->name("supplier.login");
    Route::post('/authenticate', [SupplierController::class, 'authenticate']);


    // Supplier Authenticated Routes
    Route::middleware(['auth:supplier'])->group(function () {
        Route::get('/location/{latitude}/{longitude}', [SupplierController::class, 'getLocationName']);

        Route::get('/', [SupplierController::class, 'supplierHome']);
        Route::get('/logout', [SupplierController::class, 'logout']);

        Route::get('/neworders', [SupplierController::class, 'newOrders']);
        Route::get('/acceptorder/{order}', [SupplierController::class, 'acceptOrder']);
        
        Route::get('/pendingorders', [SupplierController::class, 'pendingOrders']);
        
        Route::get('/completedorders', [SupplierController::class, 'completedOrders']);
        Route::get('/completeorder/{order}', [SupplierController::class, 'completeOrder']);

        Route::get('/stats', [SupplierController::class, 'stats']);

        Route::get('/profile', [SupplierController::class, 'showProfile']);
        Route::get('/profile/edit', [SupplierController::class, 'showEditProfileForm']);
        Route::post('/profile/edit', [SupplierController::class, 'updateProfile']);
        Route::post('/profile/delete', [SupplierController::class, 'deleteProfile']);
    });
});



// Customer Routes
Route::get('/', [CustomerController::class, 'index'])->name('customer.home');
// Customer Login
Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'authenticate']);
// Customer Registration
Route::get('/register', [CustomerController::class, 'showRegistrationForm']);
Route::post('/register', [CustomerController::class, 'createUser']);
//Route for About Us Page
Route::get('/about', [CustomerController::class, 'about']);
//Route for Contact Us Page
Route::get('/contact', [CustomerController::class, 'contact']);

Route::middleware(['auth:web'])->group(function () {
    //Routes for profile
    Route::get('/profile', [CustomerController::class, 'showProfile']);
    Route::get('/profile/edit', [CustomerController::class, 'showEditProfileForm']);
    Route::post('/profile/edit', [CustomerController::class, 'updateProfile']);
    Route::post('/profile/delete', [CustomerController::class, 'deleteProfile']);


    //Customer Logout
    Route::get('/logout', [CustomerController::class, 'logout']);
    // Auto Ordering Routes
    Route::get('/auto-order', [CustomerController::class, 'showAutoOrderForm']);
    Route::post('/auto-order', [CustomerController::class, 'autoOrder']);

    // Route for Order Details
    Route::get('/order', [CustomerController::class, 'showOrderForm']);
    Route::get('/orderdetails', [CustomerController::class, 'orderDetails']);

    // Route for Checkout
    Route::post('/checkout', [CustomerController::class, 'checkout']);

});
