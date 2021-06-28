<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // $siswa = Siswa::all();
        $datas = Mengajar::select(
                'siswa.nama',
                'siswa.nis',
                'siswa.kode_kelas',
                'nilai.id as id_nilai',
                'nilai.UTS',
                'nilai.UAS',
        )->join('mapel', 'mengajar.kode_mapel', '=', 'mapel.kode_mapel')
         ->join('rombel', 'rombel.kode_rombel', '=', 'mengajar.kode_rombel')
         ->join('siswa', 'siswa.kode_rombel', '=', 'mengajar.kode_rombel')
         ->join('guru', 'guru.id_guru', '=', 'mengajar.id_guru')
         ->join('nilai', 'siswa.nis', '=', 'nilai.nis')
         ->where('guru.id_guru', 1)->paginate(2);
        // SELECT * FROM `mengajar` INNER JOIN mapel ON mapel.kode_mapel = mengajar.kode_mapel INNER JOIN rombel ON rombel.kode_rombel = mengajar.kode_rombel INNER JOIN siswa ON siswa.kode_rombel = mengajar.kode_rombel INNER JOIN nilai ON siswa.nis = nilai.nis WHERE id_guru = 1



        return view('pages.home',compact('datas'));
    }

    // public function get()
    // {
    //     $siswa = Siswa::all();

    //     return response()->json($siswa, 200);
    // }

    public function putNilaiUtsUas(Request $request,$id)
    {
        $findNilai = Nilai::where('id', $id)->first();
            if($findNilai){
                $dataNilai = [
                    'UTS' => $request->uts_value,
                    'UAS' => $request->uas_value,
                ];
                Nilai::where('id',$id)->update($dataNilai);
                return response()->json([
                    'status'        => array('code' => 200, 'message' => 'Success update new izin.'),
                ], 200);
            }
        return response()->json($siswa, 200);
    }

}
