<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Rombel;
use App\Models\NilaiAkhir;
use App\Models\BebanAjar;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use DB;

class NilaiController extends Controller
{
    public function index()
    {
        // $siswa = Siswa::all();
        $datas = BebanAjar::select(
                'siswa.nama',
                'siswa.nis',
                'siswa.id_kelas',
                'nilai.id_nilai',
                'nilai.UTS',
                'nilai.UAS',
                'nilai.semester',
                'mapel.nama_mapel',
                'beban_ajar.id_mapel',
                'kelas.nama_kelas',
        )->join('mapel', 'beban_ajar.id_mapel', '=', 'mapel.id_mapel')
         ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
         ->join('siswa', 'siswa.id_kelas', '=', 'beban_ajar.id_kelas')
         ->join('guru', 'guru.kode_guru', '=', 'beban_ajar.kode_guru')
         ->join('nilai', 'siswa.nis', '=', 'nilai.nis')
         ->where('guru.kode_guru', 1)->paginate(2);
        // SELECT * FROM `beban_ajar` INNER JOIN mapel ON mapel.id_mapel = beban_ajar.id_mapel INNER JOIN kelas ON kelas.id_kelas = beban_ajar.id_kelas INNER JOIN siswa ON siswa.id_kelas = beban_ajar.id_kelas INNER JOIN nilai ON siswa.nis = nilai.nis WHERE kode_guru = 1

        $mapels = BebanAjar::select(
                'beban_ajar.id_mapel',
                'mapel.nama_mapel',
                'kelas.nama_kelas',
        )->join('mapel', 'beban_ajar.id_mapel', '=', 'mapel.id_mapel')
         ->join('kelas', 'beban_ajar.id_kelas', '=', 'kelas.id_kelas')
         ->where('beban_ajar.kode_guru', 1)->get();

        return view('pages.kelolaNilai',compact('datas','mapels'));
    }

    public function index_tugas($nis,$mapel,$semester)
    {
        $siswa = Siswa::select(
                'siswa.nama',
        )->where('siswa.nis', $nis)->first();

        $datas = Siswa::select(
                'tugas.keterangan',
                'tugas.nilai',
                'tugas.id',
        )->join('tugas', 'tugas.nis', '=', 'siswa.nis')
         ->where('siswa.nis', $nis)->get();

        return view('pages.tugas',compact('datas','nis','mapel','siswa','semester'));
    }

    // public function get()
    // {
    //     $siswa = Siswa::all();

    //     return response()->json($siswa, 200);
    // }

    public function putNilaiUtsUas(Request $request,$id)
    {
        $findNilai = Nilai::where('id_nilai', $id)->first();
            if($findNilai){
                $dataNilai = [
                    'UTS' => $request->uts_value,
                    'UAS' => $request->uas_value,
                ];
                Nilai::where('id_nilai',$id)->update($dataNilai);
                return response()->json([
                    'status'        => array('code' => 200, 'message' => 'Success update new izin.'),
                ], 200);
            }
        return response()->json($siswa, 200);
    }

    public function postNilaiTugas(Request $request,$nis)
    {
        
        $dataTugas = new Tugas;
        $dataTugas->keterangan = $request->keterangan;       
        $dataTugas->id_mapel = $request->id_mapel;  
        $dataTugas->nilai = $request->nilai; 
        $dataTugas->nis = $request->nis; 
        $dataTugas->semester = $request->semester;
        $dataTugas->save();

        $this->updatePengetahuan($request->id_mapel,$request->nis);
    
        // return response()->json(['status' => array('code' => 200, 'message' => 'gagal store new tugas.'),
        // ], 200);
    }

    public function updatePengetahuan($id_mapel,$nis){
        // tambahin semester di avg_tugas(masih Belom)
        $avg_tugas = DB::table('tugas')
                ->where('id_mapel', $id_mapel)
                ->where('nis',$nis)
                ->where('tahun_ajaran','like', date("Y"). '%')
                ->avg('nilai');

        $nilai = Nilai::select('nis','UTS','UAS','tahun_ajaran')
                ->where('id_mapel', $id_mapel)
                ->where('nis',$nis)
                ->where('tahun_ajaran','like', date("Y"). '%')
                ->first();
        
        $hasilPengetahuan = ($nilai->UTS + $nilai->UAS + $avg_tugas)/3;
        // return view(var_dump($hasilPengetahuan));

        Nilai::where('id_mapel', $id_mapel)
            ->where('nis',$nis)
            ->where('tahun_ajaran','like', date("Y"). '%')
            ->update(['pengetahuan' => $hasilPengetahuan]);
    }


    public function putNilaiTugas(Request $request,$id_tugas)
    {
        $datanilai = Tugas::where('id', $id_tugas)->first();

        if($datanilai){
            //ketemu
            $dataNilaiTugas = [
                'nilai' => $request->tugas_value,
            ];
            Tugas::where('id',$id_tugas)->update($dataNilaiTugas);
            $this->updatePengetahuan($request->id_mapel,$request->nis);

            return response()->json(['status' => array('code' => 200, 'message' => 'Success update Tugas.'),
            ], 200);
        }

        return response()->json([
                    'status' => array('code' => 200, 'message' => 'gagal update new tugas.'),
                ], 200);
        
    }

    public function index_ledger(Request $request)
    {
        $kode_rombel = $request->kode_rombel;
        $tahun_ajaran= $request->tahun_ajaran;
        $datas = Nilai::select(
            'siswa.nis',
            'siswa.nama',
            // DB::raw('group_concat(mapel.nama_mapel) as nama_mapel'),
            // DB::raw('group_concat(nilai.pengetahuan) as P'),
            // DB::raw('group_concat(nilai.keterampilan) as K'),
            // DB::raw('group_concat(nilai.sikap) as S'),
            DB::raw("array_to_string(array_agg(mapel.nama_mapel), ',') as nama_mapel"),
            DB::raw("array_to_string(array_agg(nilai.pengetahuan), ',') as P"),
            DB::raw("array_to_string(array_agg(nilai.keterampilan), ',') as K"),
            DB::raw("array_to_string(array_agg(nilai.sikap), ',') as S"),
        )->join('mapel', 'nilai.id_mapel', '=', 'mapel.id_mapel')
        ->join('siswa', 'nilai.nis', '=', 'siswa.nis')
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->join('rombel', 'kelas.kode_rombel', '=', 'rombel.kode_rombel')
        ->groupBy('nilai.nis')
        ->where('nilai.tahun_ajaran',$tahun_ajaran)
        ->where('rombel.kode_rombel',$kode_rombel)
        ->get();

        $rombels = Rombel::all();
        $mapelsObj = Rombel::select('kategori_mapel')->where('kode_rombel',$kode_rombel)->first();
        // $mapels = json_decode($mapelsObj['kategori_mapel']);
        $mapels = json_decode($mapelsObj->kategori_mapel,true);

        if($mapels==null){
            $mapels = [];
        }

        $findRombel = Rombel::find($kode_rombel);
        $nama_rombel = $findRombel->nama_rombel . " " . $findRombel->jurusan;

        return view('pages.lihat-ledger',compact('nama_rombel','mapels','rombels','datas','kode_rombel','tahun_ajaran'));
    }


    
    
}
