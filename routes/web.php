<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthManager;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/products', [ProductController::class, 'products'])->middleware('can:Products')->name('products');

Route::group(['middleware' => 'overdue'], function () {
    Route::get('/checkout', [ProductController::class, 'checkout'])->middleware('can:Checkout')->name('checkout');
});


Route::resource('users', UserController::class)->only(['index','edit','update']);





