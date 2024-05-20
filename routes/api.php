<?php

use App\Http\Controllers\Api\SatuanKerjaController;
use App\Http\Controllers\Api\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('provinsi', [WilayahController::class, 'provinsi']);
Route::get('kota', [WilayahController::class, 'kota']);
Route::get('kecamatan', [WilayahController::class, 'kecamatan']);
Route::get('kelurahan', [WilayahController::class, 'kelurahan']);

Route::get('satker', [SatuanKerjaController::class, 'index'])->name('api.satker');