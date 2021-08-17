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
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\BebanAjarController;


// Route::get('/login', function(){
//     return view('pages.login');
// })->name('login');


Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {
   
});

Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/post/kelas', [KelasController::class, 'store']);
Route::post('/ganti-walikelas', [KelasController::class, 'ganti_walikelas']);
Route::get('/kelas-kelola-siswa/{nis}/{id_kelas}', [KelasController::class, 'kelola_siswa']);

Route::get('/guru', [GuruController::class, 'index']);
Route::get('/form-guru/{ket}', [GuruController::class, 'form_guru']);
Route::post('/tambah-guru', [GuruController::class, 'tambah_guru']);
Route::post('/edit-guru/{id}', [GuruController::class, 'edit_guru']);
Route::get('/hapus-guru/{id}', [GuruController::class, 'hapus_guru']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/form-siswa/{ket}', [SiswaController::class, 'form_siswa']);
Route::post('/tambah-siswa', [SiswaController::class, 'tambah_siswa']);
Route::post('/edit-siswa/{id}', [SiswaController::class, 'edit_siswa']);
Route::get('/hapus-siswa/{id}', [SiswaController::class, 'hapus_siswa']);

Route::get('/absensi', [AbsensiController::class, 'index']);
Route::post('/tambah-absensi', [AbsensiController::class, 'store']);
Route::post('/edit-absensi/{id}', [AbsensiController::class, 'update']);
Route::get('/hapus-absensi/{id}', [AbsensiController::class, 'destroy']);

Route::get('/mapel', [MapelController::class, 'index']);
Route::get('/form-mapel/{ket}', [MapelController::class, 'form_mapel']);
Route::post('/tambah-mapel', [MapelController::class, 'tambah_mapel']);
Route::post('/edit-mapel/{id}', [MapelController::class, 'edit_mapel']);
Route::get('/hapus-mapel/{id}', [MapelController::class, 'hapus_mapel']);
Route::get('/tambah-kategori/{nama_mapel}/{kode_rombel}', [MapelController::class, 'tambah_kategori']);
Route::get('/hapus-kategori/{nama_mapel}/{kode_rombel}', [MapelController::class, 'hapus_kategori']);

Route::get('/beban', [BebanAjarController::class, 'index']);
Route::get('/form-beban/{ket}', [BebanAjarController::class, 'form_beban']);
Route::post('/tambah-beban', [BebanAjarController::class, 'tambah_beban']);
Route::post('/edit-beban/{id}', [BebanAjarController::class, 'edit_beban']);
Route::get('/hapus-beban/{id}', [BebanAjarController::class, 'hapus_beban']);



Route::get('/ledger', [NilaiController::class, 'index_ledger']);


Route::get('/menu-guru', [NilaiController::class, 'index']);
Route::get('/menu-guru/tugas/{nis}/{mapel}/{semester}', [NilaiController::class, 'index_tugas']);
Route::post('/put/nilaiUtsUas/{id}', [NilaiController::class, 'putNilaiUtsUas']);
Route::post('/put/nilaiTugas/{id_tugas}', [NilaiController::class, 'putNilaiTugas']);
Route::post('/post/nilaiTugas/{nis}', [NilaiController::class, 'postNilaiTugas']);




