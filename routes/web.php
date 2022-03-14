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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/student', [App\Http\Controllers\StudentController::class, 'index']);

Route::get('/student/add', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/add', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');

Route::get('/student/view/{id}', [StudentController::class, 'singleView'])->name('student.view');
Route::get('/old', [App\Http\Controllers\StudentController::class, 'oldSite']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');