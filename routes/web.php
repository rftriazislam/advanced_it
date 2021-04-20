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
//--------------------------------------------------------

Route::group(['middleware' => ['auth', 'admin'],], function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

});

//-------------------------------------------------

Route::group(['middleware' => ['auth', 'teacher'],], function () {

    Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');


});


Route::group(['middleware' => ['auth', 'librarian'],], function () {


    Route::get('/librarian', [App\Http\Controllers\LibrarianController::class, 'index'])->name('librarian');




});



Route::group(['middleware' => ['auth', 'accountant'],], function () {

    Route::get('/accountant', [App\Http\Controllers\AccountantController::class, 'index'])->name('accountant');





});