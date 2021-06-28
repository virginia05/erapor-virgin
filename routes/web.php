<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\SiswaController;

Route::get('/', [SiswaController::class, 'index']);
Route::post('/put/nilaiUtsUas/{id}', [SiswaController::class, 'putNilaiUtsUas']);
// Route::post('/put/uas/{id}', [SiswaController::class, 'putNilaiUas']);

// Route::get('/', function(){
//     return View::make('pages.home');
// });
Route::get('about', function(){
    return View::make('pages.about');
});
Route::get('projects', function(){
    return View::make('pages.projects');
});
Route::get('contact', function(){
    return View::make('pages.contact');
});