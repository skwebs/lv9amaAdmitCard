<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\StudentController::class, 'index']);

Route::get('/student/add', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/add', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');

Route::get('/student/view/{id}', [StudentController::class, 'view'])->name('student.view');

Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');

Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');


Route::get('/old', [App\Http\Controllers\StudentController::class, 'oldSite']);
Route::get('/student/admit-card', [App\Http\Controllers\StudentController::class, 'admitCard']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');