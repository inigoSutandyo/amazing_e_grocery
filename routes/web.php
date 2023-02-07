<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
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
    Route::middleware('guest')->group(function () {
        Route::get('/', function () {
            return view('main.landing');
        })->name('landing');

        Route::prefix('/auth')->middleware('guest')->group(function () {
            Route::get('/register', [AuthController::class, 'toRegister'])->name('register');
            Route::post('/register', [AuthController::class, 'register'])->name('register-validate');
            Route::get('/login', [AuthController::class, 'toLogin'])->name('login');
            Route::post('/login', [AuthController::class, 'login'])->name('login-validate');
        });
    });
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect('/home');
        })->name('landing');

        Route::get('/home', [ItemController::class, 'home'])->name('home');
    });

});

