<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AssingClassTeacherController;
use App\Http\Controllers\ClassTimetableController;


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

Route::get('/', [AuthController::class,'login']);
Route::post('/login', [AuthController::class,'AuthLogin']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/forgot-password',[AuthController::class,'forgotpassword']);
Route::post('/forgot-password', [AuthController::class,'PostForgotPassword']);

Route::get('reset/{token}',[AuthController::class,'reset']);
Route::post('reset/{token}',[AuthController::class,'PostReset']);






Route::group(['middleware' => 'admin'],function(){

    Route::get('/admin/dashboard',[DashboardController::class,'dashboard']);

    Route::get('admin/account',[UserController::class,'MyAccount']);
    Route::post('admin/account',[UserController::class,'UpdateMyAccountAdmin']);  

    Route::get('/admin/admin/list',[AdminController::class,'list']);
    Route::get('/admin/admin/add',[AdminController::class,'add']);
    Route::post('/admin/admin/add',[AdminController::class,'insert']);
    Route::get('/admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('/admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('/admin/admin/delete/{id}',[AdminController::class,'delete']);

    Route::get('/admin/class/list',[ClassController::class,'list']);
    Route::get('/admin/class/add',[ClassController::class,'add']);
    Route::post('/admin/class/add',[ClassController::class,'insert']);
    Route::get('/admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::post('/admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('/admin/class/delete/{id}',[ClassController::class,'delete']);


    Route::get('/admin/student/list',[StudentController::class,'list']);
    Route::get('/admin/student/add',[StudentController::class,'add']);
    Route::post('/admin/student/add',[StudentController::class,'insert']);
    Route::get('/admin/student/edit/{id}',[StudentController::class,'edit']);
    Route::post('/admin/student/edit/{id}',[StudentController::class,'update']);
    Route::get('/admin/student/delete/{id}',[StudentController::class,'delete']);


    Route::get('/admin/teacher/list',[TeacherController::class,'list']);
    Route::get('/admin/teacher/add',[TeacherController::class,'add']);
    Route::post('/admin/teacher/add',[TeacherController::class,'insert']);
    Route::get('/admin/teacher/edit/{id}',[TeacherController::class,'edit']);
    Route::post('/admin/teacher/edit/{id}',[TeacherController::class,'update']);
    Route::get('/admin/teacher/delete/{id}',[TeacherController::class,'delete']);


    Route::get('/admin/parent/list',[ParentController::class,'list']);
    Route::get('/admin/parent/add',[ParentController::class,'add']);
    Route::post('/admin/parent/add',[ParentController::class,'insert']);
    Route::get('/admin/parent/edit/{id}',[ParentController::class,'edit']);
    Route::post('/admin/parent/edit/{id}',[ParentController::class,'update']);
    Route::get('/admin/parent/delete/{id}',[ParentController::class,'delete']);
    Route::get('/admin/parent/my-student/{id}',[ParentController::class,'myStudent']);
    Route::get('/admin/parent/assign_student_parent/{student_id}/{parent_id}',[ParentController::class,'AssignStudentParent']);
    Route::get('/admin/parent/assign_student_parent_delete/{student_id}',[ParentController::class,'AssignStudentParentDelete']);

    Route::get('/admin/subject/list',[SubjectController::class,'list']);
    Route::get('/admin/subject/add',[SubjectController::class,'add']);
    Route::post('/admin/subject/add',[SubjectController::class,'insert']);
    Route::get('/admin/subject/edit/{id}',[SubjectController::class,'edit']);
    Route::post('/admin/subject/edit/{id}',[SubjectController::class,'update']);
    Route::get('/admin/subject/delete/{id}',[SubjectController::class,'delete']);


    Route::get('/admin/assign_subject/list',[ClassSubjectController::class,'list']);
    Route::get('/admin/assign_subject/add',[ClassSubjectController::class,'add']);
    Route::post('/admin/assign_subject/add',[ClassSubjectController::class,'insert']);
    Route::get('/admin/assign_subject/edit/{id}',[ClassSubjectController::class,'edit']);
    Route::post('/admin/assign_subject/edit/{id}',[ClassSubjectController::class,'update']);
    Route::get('/admin/assign_subject/edit_single/{id}',[ClassSubjectController::class,'editSingle']);
    Route::post('/admin/assign_subject/edit_single/{id}',[ClassSubjectController::class,'updateSingle']);
   
    Route::get('/admin/assign_subject/delete/{id}',[ClassSubjectController::class,'delete']);
   

    Route::get('/admin/change_password',[UserController::class,'changePassword']);
    Route::post('/admin/change_password',[UserController::class,'updatePassword']);
   

    Route::get('/admin/assign_class_teacher/list',[AssingClassTeacherController::class,'list']);
    Route::get('/admin/assign_class_teacher/add',[AssingClassTeacherController::class,'add']);
    Route::post('/admin/assign_class_teacher/add',[AssingClassTeacherController::class,'insert']);
    Route::get('/admin/assign_class_teacher/edit/{id}',[AssingClassTeacherController::class,'edit']);
    Route::post('/admin/assign_class_teacher/edit/{id}',[AssingClassTeacherController::class,'update']);
    Route::get('/admin/assign_class_teacher/edit_single/{id}',[AssingClassTeacherController::class,'edit_single']);
    Route::post('/admin/assign_class_teacher/edit_single/{id}',[AssingClassTeacherController::class,'updateSingle']);
    
    Route::get('/admin/assign_class_teacher/delete/{id}',[AssingClassTeacherController::class,'delete']);
   
    Route::get('/admin/class_timetable/list',[ClassTimetableController::class,'list']);
    Route::post('/admin/class_timetable/get_subject',[ClassTimetableController::class,'get_subject']);
    Route::post('/admin/class_timetable/add',[ClassTimetableController::class,'insert_update']);



});

Route::group(['middleware' => 'teacher'],function(){

    Route::get('/teacher/dashboard',[DashboardController::class,'dashboard']);

    Route::get('teacher/change_password',[UserController::class,'changePassword']);
    Route::post('teacher/change_password',[UserController::class,'updatePassword']);

    Route::get('teacher/account',[UserController::class,'MyAccount']);
    Route::post('teacher/account',[UserController::class,'UpdateMyAccount']);   
    
    Route::get('teacher/my_class_subject',[AssingClassTeacherController::class,'MyClassSubject']);
    Route::get('teacher/my_student',[StudentController::class,'MyStudent']);
    

    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}',[ClassTimetableController::class,'MyTimetableTeacher']);


});

Route::group(['middleware' => 'student'],function(){


    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/student/my_subject',[SubjectController::class,'MySubject']);

    Route::get('student/change_password',[UserController::class,'changePassword']);
    Route::post('student/change_password',[UserController::class,'updatePassword']);

    Route::get('student/account',[UserController::class,'MyAccount']);
    Route::post('student/account',[UserController::class,'UpdateMyAccountStudent']);   
    Route::get('student/my_timetable',[ClassTimetableController::class,'MyTimetable']);   

});

Route::group(['middleware' => 'parent'],function(){


    Route::get('/parent/dashboard',[DashboardController::class,'dashboard']);
    Route::get('parent/change_password',[UserController::class,'changePassword']);
    Route::post('parent/change_password',[UserController::class,'updatePassword']);
    Route::get('parent/account',[UserController::class,'MyAccount']);
    Route::post('parent/account',[UserController::class,'UpdateMyAccountParent']);   

    Route::get('parent/my_student',[ParentController::class,'MyStudentParent']);
    Route::get('parent/my_student/subject/{student_id}',[ParentController::class,'ParentStudentsSubject']);
   
    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}',[ClassTimetableController::class,'MyTimetableParent']);


});

