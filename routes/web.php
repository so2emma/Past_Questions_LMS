<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SessionController;

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
    return view('guest.index');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix("user")->name('user.')->group(function() {
    Route::middleware('guest:web')->group(function() {

    });
    Route::middleware('auth:web')->group(function() {
        Route::view('/dashboard', 'user.dashboard')->name('dashboard');
    });
});


//Admin Routes
Route::prefix("admin")->name("admin.")->group(function() {
    Route::middleware(["guest:admin", "PreventBackHistory"])->group(function() {
        Route::view('/login','admin.auth.login')->name("login");
        // Route::view('/register','admin.auth.register')->name("register");
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name("authenticate");
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        // Route::view('/dashboard','admin.dashboard')->name("dashboard");
        Route::get('/dashboard', [DashboardController::class, "dashboard"])->name('dashboard');
        Route::post("/logout", [AuthController::class, "logout"])->name("logout");
        Route::resource('courses', CourseController::class);
        Route::resource('questions', QuestionController::class)->middleware('ChaeckCourseAndSession');
        Route::resource('sessions', SessionController::class);
    });
});
