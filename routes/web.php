<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SchoolController;

Route::resource('students', StudentController::class)->middleware('auth');
Route::resource('courses', CourseController::class)
    ->middleware('auth');
Route::resource('enrollments', EnrollmentController::class)
    ->middleware('auth');
Route::resource('grades', GradeController::class)
    ->middleware('auth');
Route::resource('schools', SchoolController::class)
    ->middleware('auth');

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/dashboard', function ()
{
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function ()
{
    Route::get('/profile', [ProfileController::class , 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';

