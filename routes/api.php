<?php

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

use App\Http\Controllers\SiswaController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// http://127.0.0.1:8000/api/siswa
// Route::get('/siswa', [SiswaController::class, 'get']);
// Route::post('/put/uts/{id}', [SiswaController::class, 'putNilaiUts']);
// Route::post('/put/uas/{id}', [SiswaController::class, 'putNilaiUas']);
