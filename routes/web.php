<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AturanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PakarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ReportController;
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
Route::get('get/detailsA/{id}', [AturanController::class,'getDetails'])->name('getDetailsAturan');
Route::get('get/detailsG/{id}', [GejalaController::class,'getDetails'])->name('getDetailsGejala');
Route::get('get/detailsP/{id}', [PenyakitController::class,'getDetails'])->name('getDetailsPenyakit');
Route::get('get/detailsD/{id}', [DiagnosaController::class,'getDetails'])->name('getDetailsDiagnosa');
Route::get('get/detailsPAK/{id}', [PakarController::class,'getDetails'])->name('getDetailsPakar');
Route::get('get/detailsPAS/{id}', [PasienController::class,'getDetails'])->name('getDetailsPasien');
Route::get('dashboard',[DashboardController::class,'index']);
Route::resource('admin', AdminController::class);
Route::resource('aturan', AturanController::class);
Route::resource('diagnosa', DiagnosaController::class);
Route::resource('gejala', GejalaController::class);
Route::resource('pakar', PakarController::class);
Route::resource('pasien', PasienController::class);
Route::resource('penyakit', PenyakitController::class);
Route::resource('report', ReportController::class);
Route::get('print-admin', [AdminController::class, 'print']);
Route::get('print-aturan', [AturanController::class, 'print']);
Route::get('print-diagnosa', [DiagnosaController::class, 'print']);
Route::get('print-gejala', [GejalaController::class, 'print']);
Route::get('print-pakar', [PakarController::class, 'print']);
Route::get('print-pasien', [PasienController::class, 'print']);
Route::get('print-penyakit', [PenyakitController::class, 'print']);
Route::get('print-report', [ReportController::class, 'print']);
