<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LangController;
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

Route::middleware('localization')->group(function() {
    Route::get('/lang/{locale}', [LangController::class, 'changeLanguage'])->name('change-lang');
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
            Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
            Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        });
        Route::prefix('/account')->name('account.')->group(function () {
            Route::get('/me', [AccountController::class, 'profile'])->name('profile');
            Route::post('/me', [AccountController::class, 'update'])->name('update');
            Route::middleware('admin')->group(function () {
                Route::get('/maintenance', [AccountController::class, 'maintenance'])->name('maintenance');
                Route::get('/delete/{id?}', [AccountController::class, 'destroy'])->name('delete');
                Route::get('/role/{id?}', [AccountController::class, 'role'])->name('role');
                Route::post('/role/{id?}', [AccountController::class, 'updateRole'])->name('update-role');
            });
        });
    });

});

