<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanAnggotaController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KeluargaAnggotaController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PendidikanAnggotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatuanKerjaController;
use App\Http\Controllers\SearchController;
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
Route::post('/', [AuthController::class, 'signIn']);
Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('wilayah-hukum', WilayahHukumController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);

    Route::get('jabatan-anggota/index', [JabatanAnggotaController::class, 'index'])->name('jabatan-anggota');
    Route::post('jabatan-anggota/save', [JabatanAnggotaController::class, 'save'])->name('jabatan-anggota.save');
    Route::post('jabatan-anggota/delete', [JabatanAnggotaController::class, 'delete'])->name('jabatan-anggota.delete');
    Route::post('jabatan-anggota/upload', [JabatanAnggotaController::class, 'upload'])->name('jabatan-anggota.upload');


    Route::get('keluarga-anggota/index', [KeluargaAnggotaController::class, 'index'])->name('keluarga-anggota');
    Route::post('keluarga-anggota/save', [KeluargaAnggotaController::class, 'save'])->name('keluarga-anggota.save');
    Route::post('keluarga-anggota/delete', [KeluargaAnggotaController::class, 'delete'])->name('keluarga-anggota.delete');
    Route::post('keluarga-anggota/upload', [KeluargaAnggotaController::class, 'upload'])->name('keluarga-anggota.upload');

    Route::get('pendidikan-anggota/index', [PendidikanAnggotaController::class, 'index'])->name('pendidikan-anggota');
    Route::post('pendidikan-anggota/save', [PendidikanAnggotaController::class, 'save'])->name('pendidikan-anggota.save');
    Route::post('pendidikan-anggota/upload', [PendidikanAnggotaController::class, 'upload'])->name('pendidikan-anggota.upload');
    Route::post('pendidikan-anggota/delete', [PendidikanAnggotaController::class, 'delete'])->name('pendidikan-anggota.delete');

    Route::resource('anggota', AnggotaController::class);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kabupaten', KabupatenController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('satuan-kerja', SatuanKerjaController::class);

    Route::get('search', [SearchController::class, 'index'])->name('search.index');



});
