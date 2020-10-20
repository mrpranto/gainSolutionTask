<?php

use App\Http\Controllers\SegmentController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', WelcomeController::class);
Route::resource('/segment', SegmentController::class);
Route::resource('/subscriber', SubscriberController::class);
