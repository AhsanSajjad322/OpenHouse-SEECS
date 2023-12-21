<?php

use Illuminate\Support\Facades\Route;
use App\Models\Location;
use App\Models\User;
use App\Models\Evaluation;
use App\Models\Project;
use App\Models\Category;

use App\Http\Controllers\LocationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\AuthController;

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

Route::get('/',function (){
    return view('layouts.login');
})->name('loginInForm');

Route::post('/login', [AuthController::class, 'customValidate'])->name('login');


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard/{id}', [AdminController::class,'index'])->name('admin.dashboard');
    
    Route::get('/project/{id}', [AdminController::class,'viewProject'])->name('admin.project.details');

    Route::put('/project/{id}/location', [AdminController::class,'updateLocation'])->name('updateProjectLocation');
});

// Evaluator Routes
Route::prefix('evaluator')->group(function () {
    Route::get('/dashboard/{id}', [EvaluatorController::class, 'index'])->name('evaluator.dashboard');

    Route::get('{evalid}/project/{id}', [EvaluatorController::class, 'projectDetails'])->name('evaluator.view.projectDetails');

    Route::put('{evalid}/project/{id}',[EvaluatorController::class, 'updateMarks'])->name('evaluator.update.marks');
});

// Student Routes
Route::prefix('student')->group(function () {
    Route::get('/dashboard/{id}', [StudentController::class, 'index'])->name('student.dashboard');

    Route::get('{stdid}/project/{id}', [StudentController::class, 'editForm'])->name('student.edit.project.detail');

    Route::put('{stdid}/project/{id}',[StudentController::class, 'updateProject'])->name('updateProject');
});
