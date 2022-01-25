<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchByZipCodeController;
use App\Http\Controllers\SearchByAddressController;

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

Route::view('/', 'home');
Route::get('/search_by_zip_code/{zip_code?}', [SearchByZipCodeController::class, 'index'])->name("search_by_zip_code");
Route::post('/search_by_zip_code/{zip_code?}', [SearchByZipCodeController::class, 'submit']);
Route::get('/search_by_address', [SearchByAddressController::class, 'index'])->name("search_by_address");
Route::post('/search_by_address', [SearchByAddressController::class, 'submit']);