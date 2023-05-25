<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardDemandController;
use App\Http\Controllers\DashboardDivisionController;
use App\Http\Controllers\DashboardInformationController;


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




Route::get('/', [LandingPageController::class, 'index']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/dashboard/information/file/{file:nama_file}', [FileController::class, 'destroy'])->middleware('auth');
Route::post('/dashboard/information/file', [FileController::class, 'store'])->middleware('auth');

Route::get('/preview/{file:nama_file}', [informationController::class, 'previewPdf']);
Route::get('/dashboard/preview/{file:nama_file}', [DashboardInformationController::class, 'previewPdf']);

Route::resource('/dashboard/information', DashboardInformationController::class)->scoped(['information' => 'slug'])->except('edit')->middleware('auth');
Route::resource('/dashboard/division', DashboardDivisionController::class)->scoped(['division' => 'kode_divisi'])->except('create','show','edit')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/dashboard/users/status/update/{user:username}', [UserController::class, 'updateStatus'])->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->scoped(['user' => 'username'])->middleware('super_admin');


Route::post('/dashboard/demand/process/{demand:kode_permohonan}', [DashboardDemandController::class, 'process'])->middleware('auth');
Route::post('/dashboard/demand/report', [DashboardDemandController::class, 'report'])->middleware('auth');

Route::get('/dashboard/demand/status/{demand:status}', [DashboardDemandController::class, 'demandStatus'])->middleware('auth');
Route::resource('/dashboard/demand', DashboardDemandController::class)->scoped(['demand' => 'kode_permohonan'])->except('create','store','edit','update')->middleware('auth');



Route::post('/demand/check_demand', [DemandController::class, 'checkDemand']);
Route::post('/demand', [DemandController::class, 'store']);

Route::get('/information', [InformationController::class, 'index']);

Route::get('/information/{information:slug}', [InformationController::class, 'show']);

Route::get('/information/demand/rejected', [DemandController::class, 'demandRejected']);
