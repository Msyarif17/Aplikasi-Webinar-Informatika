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
Route::get('/', [App\Http\Controllers\FrontEnd\IndexController::class, 'index'])->name('index');
Route::get('/webinar-if', [App\Http\Controllers\FrontEnd\IndexController::class, 'webinar'])->name('webinar');



Route::get('/cek/{token}',[App\Http\Controllers\FrontEnd\IndexController::class, 'cek'])->name('cek');
Auth::routes();
Route::middleware(['auth'])->group(function (){
    Route::get('/webinar-if/{id}', [App\Http\Controllers\FrontEnd\IndexController::class, 'detail'])->name('webinar.detail');
    Route::get('/webinar-if/{id}/daftar',[App\Http\Controllers\FrontEnd\IndexController::class, 'daftar'])->name('reg');
    Route::get('/absen/{id}',[App\Http\Controllers\FrontEnd\AbsensiController::class, 'index'])->name('absen');
    Route::post('absen/{id}/send',[App\Http\Controllers\FrontEnd\AbsensiController::class, 'absen'])->name('absen.create');
});
Route::middleware(['auth','role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'index']);
    

    
    Route::resource('manage-admin', App\Http\Controllers\BackEnd\ManageUserController::class);
    
    Route::resource('manage-peserta', App\Http\Controllers\BackEnd\ManagePesertaController::class);
    
    Route::resource('manage-jadwal', App\Http\Controllers\BackEnd\ManageJadwalController::class);
    Route::patch('manage-jadwal/{id}/restore', [App\Http\Controllers\BackEnd\ManageJadwalController::class, 'restore'])->name('manage-jadwal.restore');
    
    Route::resource('manage-narasumber', App\Http\Controllers\BackEnd\ManageNarasumberController::class);
    
    Route::resource('manage-moderator', App\Http\Controllers\BackEnd\ManageModeratorController::class);
    
    Route::resource('manage-sertificate', App\Http\Controllers\BackEnd\ManageSertificateController::class);


    Route::prefix('/manage-report')->group(function () {
        Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'report']);
    });
    
    
    
    Route::get('/ss', [App\Http\Controllers\ZoomOauthController::class, 'generateLinkZoom']);
    Route::get('/generateToken', [App\Http\Controllers\ZoomOauthController::class, 'generateToken']);
    Route::get('/sendMail',[App\Http\Controllers\WebinarMailController::class, 'sendMailSertif']);
    Route::get('/create',[App\Http\Controllers\WebinarMailController::class, 'proses']);
    // Route::get('/cek',[App\Http\Controllers\SertifikatController::class, 'cek'])->name('cek');
    Route::get('/', [App\Http\Controllers\BackEnd\IndexController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
