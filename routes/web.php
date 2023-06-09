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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\GradeController;
use App\Http\Controllers\User\GradingController;
use App\Http\Controllers\User\SubmissionController;
use App\Http\Controllers\User\UserCourseController;

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


// USER ROUTES
Route::prefix("user")->name('user.')->group(function() {
    Route::middleware('guest:web')->group(function() {

    });
    Route::middleware('auth:web')->group(function() {
        //  DASHBOARD
        Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
        // ENROLLMENT MANAEMENT
        Route::get('/enroll', [UserCourseController::class, 'view_course'])->name('available.course');
        Route::post('/enroll', [UserCourseController::class, 'search_course'])->name('available.course');
        Route::post('course/{course}/enroll', [UserCourseController::class, 'enroll'])->name('course.enroll');
        Route::post('course/{course}/unenroll', [UserCourseController::class, 'unenroll'])->name('course.unenroll');
        Route::delete('course/{course}/unenroll', [UserCourseController::class, 'unenroll'])->name('course.unenroll');
        Route::get('courses/enrolled', [UserCourseController::class, 'enrolled_courses'])->name('enrolled.course');
        // QUESTION MANAGEMENT
        Route::get('course/{course}/questions', [UserCourseController::class, 'view_questions'])->name('course.questions');
        Route::get('questions/{question}', [UserCourseController::class, 'show_question'])->name('show.question');
        //  SUBMISSION MANAGEMENT
        Route::get('submission/{user}/list_all_submissions', [SubmissionController::class, 'index'])->name('submissions.index');
        Route::get('submission/{submission}', [SubmissionController::class, 'show'])->name('submission.show');
        Route::get('submission/{submission}/update', [SubmissionController::class, 'edit'])->name('submission.edit');
        Route::get('questions/{question}/submissions/create', [SubmissionController::class, 'create'])->name('submission.create');
        Route::post('questions/{question}/submissions', [SubmissionController::class, 'store'])->name('submission.store');
        Route::put('submission/{submission}/update', [SubmissionController::class, 'update'])->name('submission.update');
        Route::delete('submission/{submission}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
        //GRADING MANAGEMENT
        // Route::get('gradings/{user}', [GradingController::class, 'index'])->name('grading.index');
        Route::get('grading/submission/{submission}', [GradingController::class, 'display_submission'])->name('grading.submission');
        Route::post('grading/submissions/{submission}', [GradingController::class, 'store_grade'])->name('grading.allocation');
        //GRADE MANAGEMENT
        Route::get('submissions/grades/index', [GradeController::class, 'index'])->name('submission.grade.index');
        Route::get('submissions/{submission}/grades/show', [GradeController::class, 'show'])->name('submission.grade.show');

    });
});


//ADMIN ROUTES
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
        Route::resource('users', UserController::class);
    });
});
