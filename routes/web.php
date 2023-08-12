<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    });

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/pengajuan','App\Http\Controllers\PengajuanController');
    Route::resource('/revisi','App\Http\Controllers\RevisiController');
    Route::resource('/pengaturan','App\Http\Controllers\PengaturanController');
    Route::resource('/rekapitulasi','App\Http\Controllers\RekapitulasiController');
    Route::resource('/user','App\Http\Controllers\UserController');
    Route::resource('/claim','App\Http\Controllers\ClaimController');


});
