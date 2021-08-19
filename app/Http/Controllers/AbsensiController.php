<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\BebanAjar;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::id();
        $datas = BebanAjar::select(
                'kelas.id_kelas',
                'kelas.nama_kelas',
        )->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
         ->where('beban_ajar.kode_guru', $id)->get();

         $id_kelas = $request->id_kelas;

        $dataSiswa = Siswa::select('nis','nama')->where('id_kelas',$request->id_kelas)->get();
        return view('pages.absensi',compact('datas','dataSiswa','id_kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataAbsensi = new Absensi;
        $dataAbsensi->semester = $request->semester;       
        $dataAbsensi->nis = $request->nis;  
        $dataAbsensi->alfa = $request->alfa; 
        $dataAbsensi->sakit = $request->sakit; 
        $dataAbsensi->izin = $request->izin;
        $dataAbsensi->save();
        return redirect()->to('/absensi?id_kelas='.$request->id_kelas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
