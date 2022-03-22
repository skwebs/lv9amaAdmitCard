<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdmitCardController;

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

Route::controller(StudentController::class)->group(function () {
/*
    Route::get('/', 'index')->name('student');
    
    Route::get('/student', 'student_list')->name('student.list');
    
    Route::get('/student/create','create')->name('student.create');
    
    Route::post('/student/store','store')->name('student.store');
    
    Route::get('/student/upload-image/{id}', 'upload_image')->name('student.upload_image');
    
    Route::post('/student/save-image', 'save_image')->name('student.save_image');
    
    Route::get('/student/show/{id}','show')->name('student.view');
    
    Route::get('/student/edit/{id}','edit')->name('student.edit');   
   
    Route::post('/student/update/{id}','update')->name('student.update');
    
    Route::delete('/student/delete/{id}','destroy')->name('student.delete');
    
    Route::get('/student/admit-cards','admit_cards')->name('student.admit_cards');
    */
});

Route::resource('admitCard', AdmitCardController::class);

Route::controller(AdmitCardController::class)->group(function(){
	Route::get('/admitCard/upload-image/{id}', 'upload_image')->name('admitCard.upload_image');
	
	Route::post('/admitCard/save-image', 'save_image')->name('admitCard.save_image');
	
	Route::get('/admitCard/admit-cards','admit_cards')->name('admitCard.admit_cards');
	
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');