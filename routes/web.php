<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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
    return redirect(app()->getLocale());
});

Route::prefix('{locale}')->middleware('localization')->group(function() {
    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('main.landing');
    })->name('landing');
    Route::middleware('guest')->group(function () {

        Route::prefix('/auth')->middleware('guest')->group(function () {
            Route::get('/register', [AuthController::class, 'toRegister'])->name('register');
            Route::post('/register', [AuthController::class, 'register'])->name('register-validate');
            Route::get('/login', [AuthController::class, 'toLogin'])->name('login');
            Route::post('/login', [AuthController::class, 'login'])->name('login-validate');
        });
    });
    Route::middleware('auth')->group(function () {
        Route::get('/home', [ItemController::class, 'home'])->name('home');
        Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
        Route::prefix('/item')->name('item.')->group(function () {
            Route::get('/detail/{item_id?}', [ItemController::class, 'detail'])->name('show');
            Route::get('/buy/{item_id?}', [OrderController::class, 'add'])->name('buy');
        });
        Route::prefix('/cart')->name('cart.')->group(function() {
            Route::get('/show', [OrderController::class, 'show'])->name('show');
            Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        });
    });

});

