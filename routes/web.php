<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
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


//api route
Route::prefix('dashboard')->group(function () {
    
Route::prefix('product')->group(function () {
    Route::get('/', [ProjectController::class,"index"]);
    Route::get('/create', [ProjectController::class,"create"]);
    Route::post('/update', [ProjectController::class,"update"]);
    Route::post('/delete', [ProjectController::class,"delete"]);
    Route::get('/id?', [ProjectController::class,"select"]);
});

Route::prefix('user')->group(function () {
    Route::get('/', [ProjectController::class,"index"]);
    Route::post('/create', [ProjectController::class,"create"]);
    Route::post('/update', [ProjectController::class,"update"]);
    Route::post('/delete', [ProjectController::class,"delete"]);
    Route::get('/id?', [ProjectController::class,"select"]);
});

Route::get('/attendance', [ProjectController::class,"index"]);

Route::prefix('service')->group(function () {
    Route::get('/', [ServiceController::class,"index"]);
    Route::post('/create', [ServiceController::class,"create"]);
    Route::post('/update', [ServiceController::class,"update"]);
    Route::post('/delete', [ServiceController::class,"delete"]);
});

});