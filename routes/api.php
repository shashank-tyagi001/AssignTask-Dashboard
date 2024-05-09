<?php

use App\Http\Controllers\ListApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projectList',[ListApi::class,'projectList']);
Route::get('employeeList',[ListApi::class,'employeeList']);
Route::get('empList',[ListApi::class,'empList']);

//Api with the id
Route::get('project/{id?}',[ListApi::class,'project']);
Route::get('employee/{id?}',[ListApi::class,'employee']);

//Assign task
Route::get('assignTask',[ListApi::class,'assignTask']);

//User
Route::get('userUse/{id?}',[ListApi::class,'userUse']);

Route::delete('prolistDel/{id?}',[ListApi::class,'prolistDel']);
Route::put('prolistUpd/{id?}',[ListApi::class,'prolistUpd']);

//Project Updated
Route::post('proEdit',[ListApi::class,'proEdit']);

//Employee Delete & Update
Route::delete('emplistDel/{id?}',[ListApi::class,'emplistDel']);
Route::put('emplistUpd/{id?}',[ListApi::class,'emplistUpd']);

//Assign Employee
Route::delete('assignEmp/{id}',[ListApi::class,'assignEmp']);
Route::put('assignUpdate/{id}',[ListApi::class,'assignUpd']);

//Show Reports
Route::get('dailyReport',[ListApi::class,'dailyReport']);

//Users
Route::get('user/{id}',[ListApi::class,'user']);
