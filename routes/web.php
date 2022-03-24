<?php

use App\Http\Controllers\EnrollmentController;
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
    return redirect()->route('enrollment');
    return view('welcome');
});

Route::get('enrollment', [EnrollmentController::class, 'index'])->name('enrollment');
Route::post('enrollment', [EnrollmentController::class, 'store'])->name('enrollment');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboardold');



Route::prefix('admin')->group(function () {

    Route::get('dashboard', [\App\Http\Controllers\Admin\EnrollmentController::class, 'dashboard'])->name('dashboard');

    Route::get('enrollments', [\App\Http\Controllers\Admin\EnrollmentController::class, 'index'])->name('admin.enrollment');

    Route::get('courses', function () {
        return view('admin.courses');
    })->name('admin.courses');

    Route::get('mailtemplate', function () {
        return view('admin.mailtemplate');
    })->name('admin.mailtemplate');
});

