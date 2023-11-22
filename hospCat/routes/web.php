<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::post('/verify', function () {
    return view('login.verify');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/patientProfile', function () {
    return view('patientProfile');
})->name('profile');


// To check whether the number exist in the database
Route::post('/loginPhCheck', [loginController::class, 'checkNo']);
