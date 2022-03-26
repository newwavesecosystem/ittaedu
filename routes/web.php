<?php

use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\MailTemplateController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
    return redirect()->route('enrollment');
    return view('welcome');
});

Route::get('enrollment', [EnrollmentController::class, 'index'])->name('enrollment');
Route::post('enrollment', [EnrollmentController::class, 'store'])->name('enrollment');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboardold');

Route::get('login', function (){
    return view('admin.login');
})->name('login');

Route::get('register', function (){
//    return redirect()->route('login');
})->name('register');


Route::get('admin/atti/register', function (){
    return view('auth.register');
})->name('registerAdmin');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('dashboard', [\App\Http\Controllers\Admin\EnrollmentController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('enrollments', [\App\Http\Controllers\Admin\EnrollmentController::class, 'index'])->name('admin.enrollment');
        Route::get('enrollment/{id}', [\App\Http\Controllers\Admin\EnrollmentController::class, 'show'])->name('admin.enrollment.show');

        Route::get('courses', [CoursesController::class, 'index'])->name('admin.courses');
        Route::get('courses-create', [CoursesController::class, 'create'])->name('admin.courses_create');
        Route::post('courses-create', [CoursesController::class, 'store'])->name('admin.courses_create');

        Route::get('mailtemplate', [MailTemplateController::class, 'index'])->name('admin.mailtemplate');
        Route::get('mailtemplate/{id}', [MailTemplateController::class, 'show'])->name('admin.mailtemplate.show');
        Route::post('mailtemplate', [MailTemplateController::class, 'update'])->name('admin.mailtemplate.update');

        Route::get('resend/{id}', [\App\Http\Controllers\Admin\ActivityController::class, 'resend'])->name('admin.Activity.resend');

        Route::get('/logouts', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    });
});

