<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;
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

    return redirect()->route('login');
    
});

Auth::routes();

//students
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/student/create', [HomeController::class, 'showCreateStudent'])->name('student.show.create');
Route::post('/student/create', [HomeController::class, 'createStudent'])->name('create.student');
Route::get('/student/update/{id}', [HomeController::class, 'showEditStudent'])->name('student.show.edit');
Route::post('/student/update', [HomeController::class, 'updateStudent'])->name('update.student');
Route::get('/student/delete/{id}', [HomeController::class, 'deleteStudent'])->name('delete.student');

//marks
Route::get('/mark', [MarkController::class, 'index'])->name('mark');
Route::get('/mark/create', [MarkController::class, 'showCreateMark'])->name('mark.show.create');
Route::post('/mark/create', [MarkController::class, 'addMark'])->name('add.mark');
Route::get('/mark/update/{id}', [MarkController::class, 'showEditMark'])->name('mark.show.edit');
Route::post('/mark/update', [MarkController::class, 'updateMark'])->name('update.mark');
Route::get('/mark/delete/{id}', [MarkController::class, 'deleteMark'])->name('delete.mark');