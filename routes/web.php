<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class,'index']);

Route::get('/logout-logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
//-----------------------------------------------------------------------------------------------admin----------------------------

Route::group(['middleware' => ['auth', 'admin'],], function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
//---------class-----------
    Route::get('/create/class', [App\Http\Controllers\AdminController::class, 'create_class'])->name('create_class');
    Route::get('/class/list', [App\Http\Controllers\AdminController::class, 'class_list'])->name('class_list');
//---------class-----------

//---------Section-----------
Route::get('/create/section', [App\Http\Controllers\AdminController::class, 'create_section'])->name('create_section');
Route::get('/section/list', [App\Http\Controllers\AdminController::class, 'section_list'])->name('section_list');
//---------Section-----------

//---------schedule-----------
Route::get('/create/schedule', [App\Http\Controllers\AdminController::class, 'create_schedule'])->name('create_schedule');
Route::get('/schedule/list', [App\Http\Controllers\AdminController::class, 'schedule_list'])->name('schedule_list');
//---------schedule-----------

//---------material-----------
Route::get('/create/material', [App\Http\Controllers\AdminController::class, 'create_material'])->name('create_material');
Route::get('/material/list', [App\Http\Controllers\AdminController::class, 'material_list'])->name('material_list');
//---------material-----------

});

//-------------------------------------------------------------------------------------admin------------------------------------

Route::group(['middleware' => ['auth', 'teacher'],], function () {

    Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');


});


Route::group(['middleware' => ['auth', 'librarian'],], function () {


    Route::get('/librarian', [App\Http\Controllers\LibrarianController::class, 'index'])->name('librarian');




});



Route::group(['middleware' => ['auth', 'accountant'],], function () {

    Route::get('/accountant', [App\Http\Controllers\AccountantController::class, 'index'])->name('accountant');





});