<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassController;

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

    Route::get('/admin/admin/list',[AdminController::class,'list']);
    Route::get('/admin/admin/add',[AdminController::class,'add']);
    Route::post('/admin/admin/add',[AdminController::class,'insert']);
    Route::get('/admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('/admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('/admin/admin/delete/{id}',[AdminController::class,'delete']);

    Route::get('/admin/class/list',[ClassController::class,'list']);

   

});

Route::group(['middleware' => 'teacher'],function(){

    Route::get('teacher/dashboard',function(){
        return view('teacher.dashboard');
    });

  

});

Route::group(['middleware' => 'student'],function(){

    Route::get('student/dashboard',function(){
        return view('student.dashboard');
    });

});

Route::group(['middleware' => 'parent'],function(){

    Route::get('parent/dashboard',function(){
        return view('parent.dashboard');
    });

});

