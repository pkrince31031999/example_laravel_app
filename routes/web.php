<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Weatherapi;

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

// routes/web.php


Route::get('/', [weatherapi::class, 'index']);
Route::post('/get-weather-data', [Weatherapi::class, 'getWeatherData']);


// Route::get('/', [weatherapi::class, 'getWeatherData']);


