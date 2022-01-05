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



use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\BebanAjarController;
use App\Http\Controllers\KepribadianController;
use App\Http\Controllers\EkstrakulikulerController;

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('/profile', [AuthController::class, 'profile']);

// Route::group(['middleware' => 'auth'], function () {
Route::middleware('auth:guru')->group(function(){

	Route::get('/kelas', [KelasController::class, 'index']);
	Route::post('/post/kelas', [KelasController::class, 'store']);
	Route::post('/ganti-walikelas', [KelasController::class, 'ganti_walikelas']);
	Route::get('/kelas-kelola-siswa/{nis}/{id_kelas}', [KelasController::class, 'kelola_siswa']);
	Route::get('/hapus-kelasiswa/{id}', [KelasController::class, 'hapus_kelasiswa']);

	Route::get('/guru', [GuruController::class, 'index']);
	Route::get('/form-guru/{ket}', [GuruController::class, 'form_guru']);
	Route::post('/tambah-guru', [GuruController::class, 'tambah_guru']);
	Route::post('/edit-guru/{id}', [GuruController::class, 'edit_guru']);
	Route::get('/hapus-guru/{id}', [GuruController::class, 'hapus_guru']);
	Route::post('/edit-guru-profile/{id}', [GuruController::class, 'edit_guru_profile']);

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

	Route::get('/nilai', [NilaiController::class, 'index']);
	Route::get('/nilai/tugas/{nis}/{mapel}/{semester}', [NilaiController::class, 'index_tugas']);
	Route::post('/put/nilaiUtsUas/{id}', [NilaiController::class, 'putNilaiUtsUas']);
	Route::post('/put/nilaiTugas/{id_tugas}', [NilaiController::class, 'putNilaiTugas']);
	Route::get('/delete/nilaiTugas/{id_tugas}', [NilaiController::class, 'deleteNilaiTugas']);
	Route::post('/post/nilaiTugas/{nis}', [NilaiController::class, 'postNilaiTugas']);

	Route::get('/form-kepribadian/{nis}', [KepribadianController::class, 'index']);
	Route::post('/tambah-kepribadian', [KepribadianController::class, 'store']);
	Route::post('/edit-kepribadian/{id}', [KepribadianController::class, 'update']);
	Route::post('/hapus-kepribadian/{id}', [KepribadianController::class, 'delete']);
	Route::post('/edit-catatan/{nis}', [KepribadianController::class, 'update_catatan']);
	Route::get('/form-catatan/{nis}', [KepribadianController::class, 'form_catatan']);

	Route::get('/form-ekskul/{nis}', [EkstrakulikulerController::class, 'index']);
	Route::post('/tambah-ekskul', [EkstrakulikulerController::class, 'store']);
	Route::post('/edit-ekskul/{id}', [EkstrakulikulerController::class, 'update']);
	Route::get('/hapus-ekskul/{id}', [EkstrakulikulerController::class, 'destroy']);

	Route::get('/lihat-beban', [BebanAjarController::class, 'lihat_beban']);
	Route::get('/cetak_pdf_beban', [BebanAjarController::class, 'cetak_beban']);
	Route::get('/lihat-guru', [GuruController::class, 'lihat_guru']);
	Route::get('/cetak_pdf_guru', [GuruController::class, 'cetak_guru']);
	Route::get('/lihat-siswa', [SiswaController::class, 'lihat_siswa']);
	Route::get('/cetak_pdf_siswa', [SiswaController::class, 'cetak_siswa']);


	Route::get('/cetak-ledger', [NilaiController::class, 'cetak_ledger']);
	Route::get('/see-ledger', [NilaiController::class, 'see_ledger']);


	Route::get('/reset-tahun-ajaran', [BebanAjarController::class, 'reset']);
});

// Route::middleware('auth:siswa')->group(function(){
  	Route::get('/lihat-nilai', [NilaiController::class, 'lihat_nilai_siswa'])->middleware('siswa');
  	Route::get('/cetak_pdf', [NilaiController::class, 'cetak_pdf'])->middleware('siswa');
	Route::post('/edit-siswa-profile/{id}', [SiswaController::class, 'edit_siswa_profile'])->middleware('siswa');
  	
// });


