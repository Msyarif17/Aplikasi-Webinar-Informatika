<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZoomOauthController;

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
Route::get('/', [App\Http\Controllers\FrontEnd\IndexController::class, 'index'])->name('home');
Route::get('/ss', [App\Http\Controllers\ZoomOauthController::class, 'generateLinkZoom']);
Route::get('/generateToken', [App\Http\Controllers\ZoomOauthController::class, 'generateToken']);
Route::get('/sendMail',[App\Http\Controllers\WebinarMailController::class, 'sendMailSertif']);
Route::get('/create',[App\Http\Controllers\WebinarMailController::class, 'proses']);
Route::get('/cek',[App\Http\Controllers\SertifikatController::class, 'cek'])->name('cek');
Auth::routes();
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'index']);
    Route::prefix('/manage-webinar')->group(function () {
        Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'webinar']);
    });

    Route::prefix('/manage-user')->group(function () {
        Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'user']);
    });

    Route::prefix('/manage-narasumber')->group(function () {
        Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'narasumber']);
    });

    Route::prefix('/manage-sertificate')->group(function () {
        Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'sertificate']);
    });

    Route::prefix('/manage-report')->group(function () {
        Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'report']);
    });
    Route::get('/ss', [App\Http\Controllers\ZoomOauthController::class, 'generateLinkZoom']);
    Route::get('/generateToken', [App\Http\Controllers\ZoomOauthController::class, 'generateToken']);
    Route::get('/sendMail',[App\Http\Controllers\WebinarMailController::class, 'sendMailSertif']);
    Route::get('/create',[App\Http\Controllers\WebinarMailController::class, 'proses']);
    Route::get('/cek',[App\Http\Controllers\SertifikatController::class, 'cek'])->name('cek');
    Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'index']);
    Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
