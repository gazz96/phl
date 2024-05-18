<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatuanKerjaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahHukumController;
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

Route::get('/', [AuthController::class, 'formSignin']);

Route::resource('wilayah-hukum', WilayahHukumController::class);
Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('provinsi', ProvinsiController::class);
Route::resource('kota', KotaController::class);
Route::resource('kabupaten', KabupatenController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('satuan-kerja', SatuanKerjaController::class);