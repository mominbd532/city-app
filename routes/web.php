<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bulk-upload', [App\Http\Controllers\CityController::class, 'bulkUpload'])->name('bulk_upload');
Route::post('/bulk-upload', [App\Http\Controllers\CityController::class, 'bulkUpload'])->name('bulk_upload_upload');

Auth::routes();
