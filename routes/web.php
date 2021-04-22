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
 
Route::post('/class/post', [App\Http\Controllers\AdminController::class, 'post_class'])->name('post_class');
Route::get('/class/list', [App\Http\Controllers\AdminController::class, 'class_list'])->name('class_list');
//---------class-----------

//---------Section-----------
Route::get('/create/section', [App\Http\Controllers\AdminController::class, 'create_section'])->name('create_section');
Route::post('/section/post', [App\Http\Controllers\AdminController::class, 'post_section'])->name('post_section');
Route::get('/section/list', [App\Http\Controllers\AdminController::class, 'section_list'])->name('section_list');
//---------Section-----------

//---------schedule-----------
Route::get('/create/schedule', [App\Http\Controllers\AdminController::class, 'create_schedule'])->name('create_schedule');
Route::post('/schedule/post', [App\Http\Controllers\AdminController::class, 'post_schedule'])->name('post_schedule');

Route::get('/schedule/list', [App\Http\Controllers\AdminController::class, 'schedule_list'])->name('schedule_list');
//---------schedule-----------

//---------material-----------
Route::get('/create/material', [App\Http\Controllers\AdminController::class, 'create_material'])->name('create_material');
Route::post('/material/post', [App\Http\Controllers\AdminController::class, 'post_material'])->name('post_material');

Route::get('/material/list', [App\Http\Controllers\AdminController::class, 'material_list'])->name('material_list');
//---------material-----------

//---------assignment-----------
Route::get('/create/assignment', [App\Http\Controllers\AdminController::class, 'create_assignment'])->name('create_assignment');
Route::post('/assignment/post', [App\Http\Controllers\AdminController::class, 'post_assignment'])->name('post_assignment');
Route::get('/assignment/list', [App\Http\Controllers\AdminController::class, 'assignment_list'])->name('assignment_list');
//---------assignment-----------

//---------attendance-----------
Route::get('/create/attendance', [App\Http\Controllers\AdminController::class, 'create_attendance'])->name('create_attendance');
Route::post('/attendance/post', [App\Http\Controllers\AdminController::class, 'post_attendance'])->name('post_attendance');

Route::get('/attendance/list', [App\Http\Controllers\AdminController::class, 'attendance_list'])->name('attendance_list');
//---------attendance-----------

//---------exam-----------
Route::get('/create/exam', [App\Http\Controllers\AdminController::class, 'create_exam'])->name('create_exam');
Route::get('/exam/list', [App\Http\Controllers\AdminController::class, 'exam_list'])->name('exam_list');
//---------exam-----------

//---------question-----------
Route::get('/create/question', [App\Http\Controllers\AdminController::class, 'create_question'])->name('create_question');
Route::get('/question/list', [App\Http\Controllers\AdminController::class, 'question_list'])->name('question_list');
//---------question-----------

//---------library-----------
Route::get('/create/library', [App\Http\Controllers\AdminController::class, 'create_library'])->name('create_library');
Route::get('/library/list', [App\Http\Controllers\AdminController::class, 'library_list'])->name('library_list');
//---------library-----------

//---------notice-----------
Route::get('/create/notice', [App\Http\Controllers\AdminController::class, 'create_notice'])->name('create_notice');
Route::post('/notice/post', [App\Http\Controllers\AdminController::class, 'post_notice'])->name('post_notice');

Route::get('/notice/list', [App\Http\Controllers\AdminController::class, 'notice_list'])->name('notice_list');
//---------notice-----------

//---------vacation-----------
Route::get('/create/vacation', [App\Http\Controllers\AdminController::class, 'create_vacation'])->name('create_vacation');
Route::get('/vacation/list', [App\Http\Controllers\AdminController::class, 'vacation_list'])->name('vacation_list');
//---------vacation-----------

//---------video-----------
Route::get('/create/video', [App\Http\Controllers\AdminController::class, 'create_video'])->name('create_video');
Route::get('/video/list', [App\Http\Controllers\AdminController::class, 'video_list'])->name('video_list');
//---------video-----------

//---------teacher-----------
Route::get('/create/teacher', [App\Http\Controllers\AdminController::class, 'create_teacher'])->name('create_teacher');
Route::get('/teacher/list', [App\Http\Controllers\AdminController::class, 'teacher_list'])->name('teacher_list');
//---------teacher-----------

//---------student-----------
Route::get('/student/list', [App\Http\Controllers\AdminController::class, 'student_list'])->name('student_list');
//---------student-----------

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




//------------------------------------------------------------ajax-----------------------

Route::get('/get-teacher-list', [App\Http\Controllers\Ajax\AjaxController::class, 'get_teacher_list'])->name('get_teacher_list');
Route::get('/get-section-list', [App\Http\Controllers\Ajax\AjaxController::class, 'get_section_list'])->name('get_section_list');

