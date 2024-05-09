<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListApi;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('login',[DashboardController::class,'login'])->name('login');
 Route::get('logout',[DashboardController::class,'logout'])->name('logout');
 Route::get('userUse',[DashboardController::class,'userUse'])->name('userUse');

 Route::get('dailyReport',[DashboardController::class,'dailyReport'])->name('dailyReport');
 Route::post('dailyReports',[DashboardController::class,'dailyReports'])->name('dailyReports');


 Route::middleware(['admin'])->group(function () {

    Route::get('register',[DashboardController::class,'register'])->name('register');
    Route::post('registerStore',[DashboardController::class,'registerStore'])->name('registerStore');
 //Dashboard
    Route::get('index',[DashboardController::class,'index'])->name('index');
    Route::get('MainPage',[DashboardController::class,'mainPage'])->name('MainPage');

    Route::get('project',[DashboardController::class,'projectAdd'])->name('project');
    Route::post('projectStore',[DashboardController::class,'projectStore'])->name('projectStore');

    Route::get('projectUpd/{id}',[DashboardController::class,'projectUpd']);
    Route::put('proEdit/{id}',[ListApi::class,'proEdit'])->name('proEdit');

    Route::get('employeeUpd/{id}',[DashboardController::class,'employeeUpd']);
    Route::put('empEdit/{id}',[ListApi::class,'empEdit'])->name('empEdit');

    Route::get('employee',[DashboardController::class,'employeeAdd'])->name('employee');
    Route::post('employeeStore',[DashboardController::class,'employeeStore'])->name('employeeStore');

    Route::get('assignEmp',[DashboardController::class,'assignEmp'])->name('assignEmp');
    Route::post('assignEmpStore',[DashboardController::class,'assignEmpStore'])->name('assignEmpStore');

    Route::get('assignUpd/{id}',[DashboardController::class,'assignUpd']);
    Route::put('assignEdit/{id}',[ListApi::class,'assignEdit'])->name('assignEdit');

    Route::get('assignTask',[DashboardController::class,'assignTask'])->name('assignTask');
    Route::post('assignTaskStore',[DashboardController::class,'assignTaskStore'])->name('assignTaskStore');

    Route::get('showReports',[DashboardController::class,'showReports'])->name('showReports');

    Route::get('projectList',[DashboardController::class,'projectList'])->name('projectList');
    Route::get('employeeList',[DashboardController::class,'employeeList'])->name('employeeList');
    Route::get('empList',[DashboardController::class,'empList'])->name('empList');
    Route::get('taskList',[DashboardController::class,'taskList'])->name('taskList');
    Route::get('assignmentList',[DashboardController::class,'assignmentList'])->name('assignmentList');
});
