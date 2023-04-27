<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pegawai', [ApiController::class, 'getPegawaiList']);
Route::get('/jabatan', [ApiController::class, 'getJabatanList']);

Route::prefix('kontrak')->group(function () {
    Route::get('/', [ApiController::class, 'getKontrakList']);
    Route::post('/create', [ApiController::class, 'storeKontrak']);
    Route::get('/{id}', [ApiController::class, 'getKontrak']);
    Route::put('/edit/{id}', [ApiController::class, 'updateKontrak']);
    Route::delete('/delete/{id}', [ApiController::class, 'deleteKontrak']);
});