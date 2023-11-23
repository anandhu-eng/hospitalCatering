<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\viewCartController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\addCartController;
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
    return view('index');
});

Route::get('/home', [loginController::class, 'home'])->name('home');

// Route to get the profile details
Route::get('/profile',[profileController::class, 'viewProfile'])->name('profile');

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::post('/verify', function () {
    return view('login.verify');
})->name('verify');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Route for viewing the orders
Route::get('/order', [orderController::class, 'viewOrders'])->name('order');

// To check whether the number exist in the database
Route::post('/loginPhCheck', [loginController::class, 'checkNo']);

// Function to add the items to cart.
Route::post('/addCart',[addCartController::class, 'cartJsonRequest']);

// Route to view the cart details
Route::get('/viewCart',[viewCartController::class, 'viewCart'])->name('viewCart');

// Route to officialy place the order from the cart
Route::get('/placeOrder',[viewCartController::class, 'placeOrder'])->name('placeOrder');

//Route for the user to log out
Route::get('/logOut',[loginController::class, 'logOut'])->name('logOut');

