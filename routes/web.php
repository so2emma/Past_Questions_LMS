<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\PreventBackHistory;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("admin")->name("admin.")->group(function() {
    Route::middleware(["guest:admin", "PreventBackHistory"])->group(function() {
        Route::view('/login','admin.auth.login')->name("login");
        // Route::view('/register','admin.auth.register')->name("register");
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name("authenticate");
    });
    
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        Route::view('/dashboard','admin.dashboard')->name("dashboard");
        Route::post("/logout", [AuthController::class, "logout"])->name("logout");
    });
});
