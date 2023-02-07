<?php

use App\Http\Controllers\AuthController;
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

        Route::get('/register', [AuthController::class, 'toRegister'])->name('register');
        Route::get('/login', [AuthController::class, 'toLogin'])->name('login');
    });
});

