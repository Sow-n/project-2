<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PitchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PitchTypeController;
use App\Http\Controllers\TimeController;

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

Route::resource('admin', AdminController::class);
Route::resource('area', AreaController::class);
Route::resource('customer', CustomerController::class);
Route::resource('pitch', PitchController::class);
Route::resource('pitchType', PitchTypeController::class);
Route::resource('bill', BillController::class);
Route::resource('time', TimeController::class);
