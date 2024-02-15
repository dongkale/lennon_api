<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello/{arg}', [HelloController::class, 'show']);
Route::get('/temp', [TempController::class, 'show']);

// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::get('/', [PagesController::class, 'index'])->name('pages.index');
//     Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
// });

// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/age', [DashboardController::class, 'age']);
Route::get('/dashboard/gender', [DashboardController::class, 'gender']);
Route::get('/dashboard/geo', [DashboardController::class, 'geo']);

Route::post('/dashboard/listsExport', [DashboardController::class, 'listsExport']);
