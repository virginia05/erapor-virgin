<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\NilaiAkhir;
use App\Models\BebanAjar;
use App\Models\Tugas;
use App\Models\Ekstrakulikuler;
use App\Models\Absensi;
use App\Models\Kepribadian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use PDF;

class NilaiController extends Controller
{
    public function index(Request $r)
    {
        $kelasAjar = $r->id_kelas;
        $mapelAjar = $r->id_mapel;
        $id = Auth::id();
        $mapelYangDiajar = BebanAjar::select(
            'beban_ajar.id_mapel',
            'mapel.nama_mapel',
        )->join('mapel', 'beban_ajar.id_mapel', '=', 'mapel.id_mapel')
        ->where('beban_ajar.kode_guru', $id)
        ->groupBy('mapel.nama_mapel')->get();

        $kelasYangDiajar = BebanAjar::select(
                'beban_ajar.id_kelas',
                'kelas.nama_kelas',
        )->join('kelas', 'beban_ajar.id_kelas', '=', 'kelas.id_kelas')
        ->where('beban_ajar.kode_guru', $id)
        ->groupBy('kelas.nama_kelas')->get();

        $datas = BebanAjar::select(
            'siswa.nama',
            'siswa.nis',
            'siswa.id_kelas',
            'nilai.id_nilai',
            'nilai.UTS',
            'nilai.UAS',
            'nilai.keterampilan',
            'nilai.sikap',
            'nilai.semester',
            'mapel.nama_mapel',
            'beban_ajar.id_mapel',
            'kelas.nama_kelas',
    )->join('mapel', 'beban_ajar.id_mapel', '=', 'mapel.id_mapel')
    ->join('nilai', 'beban_ajar.id_mapel', '=', 'nilai.id_mapel')
     ->join('siswa', 'siswa.nis', '=', 'nilai.nis')
     ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
     ->groupBy('nilai.id_nilai')->where('beban_ajar.kode_guru', $id);

         if($mapelAjar){
            $datas = $datas->where('mapel.id_mapel', $mapelAjar);
         }else if($kelasAjar){
            $datas = $datas->where('kelas.id_kelas', $kelasAjar);
         }else{
            $datas = $datas->where('kelas.id_kelas', $kelasYangDiajar[0]->id_kelas)->orWhere('mapel.id_mapel', $mapelAjar);
         }

         $datas = $datas->paginate(7)->withQueryString();


        $isWalikelas = false;
        $kelasDiwalikan = 1;
        $user = Kelas::where('kode_guru',$id)->get();
        if ($user != null) {
            // user found
            $isWalikelas = true;
            $kelasDiwalikan = Siswa::where('id_kelas',$user[0]->id_kelas)->get();
            // var_dump($user->id_kelas);
            
            if($user[0]->id_kelas == 1){
                $kelasDiwalikan = Siswa::where('id_kelas',$user[1]->id_kelas)->get();
            }
            // var_dump($kelasDiwalikan);
            // die();
        }

        return view('pages.kelolaNilai',compact('datas','mapelYangDiajar','kelasYangDiajar','kelasAjar','mapelAjar','kelasDiwalikan','isWalikelas'));
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
         ->where('siswa.nis', $nis)
         ->where('tugas.id_mapel', $mapel)
         ->get();

        return view('pages.tugas',compact('datas','nis','mapel','siswa','semester'));
    }

    public function putNilaiUtsUas(Request $request,$id)
    {
        $findNilai = Nilai::where('id_nilai', $id)->first();
            if($findNilai){
                $dataNilai = [
                    'keterampilan' => $request->keterampilan,
                    'sikap' => $request->sikap,
                    'UTS' => $request->uts_value,
                    'UAS' => $request->uas_value,
                ];
                Nilai::where('id_nilai',$id)->update($dataNilai);
                $this->updatePengetahuan($findNilai->id_mapel,$findNilai->nis);

                return response()->json([
                    'status'        => array('code' => 200, 'message' => 'Success update new izin.'),
                ], 200);

            }
        return response()->json($siswa, 200)->with('message','Data Berhasil Ditambahkan');
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

        return redirect()->to('/nilai/tugas/'.$request->nis.'/'.$request->id_mapel.'/'.$request->semester)->with('message','Data Berhasil Ditambahkan');;

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

            return redirect()->to('/nilai/tugas/'.$request->nis.'/'.$request->id_mapel.'/'.$datanilai->semester)->with('warning','Data Diubah');
        }  
    }

    public function deleteNilaiTugas(Request $request,$id_tugas)
    {
        $datanilai = Tugas::where('id', $id_tugas)->first();
        if($datanilai){
            Tugas::where('id',$id_tugas)->delete();
            $this->updatePengetahuan($datanilai->id_mapel,$datanilai->nis);
            return redirect()->to('/nilai/tugas/'.$datanilai->nis.'/'.$datanilai->id_mapel.'/'.$datanilai->semester)->with('error','Data Dihapus');
        }
        
    }

    public function index_ledger(Request $request)
    {
        $kode_rombel = $request->kode_rombel;
        $tahun_ajaran= $request->tahun_ajaran;
        $datas = Nilai::select(
            'siswa.nis',
            'siswa.nama',
            DB::raw('group_concat(mapel.nama_mapel) as nama_mapel'),
            DB::raw('group_concat(nilai.pengetahuan) as P'),
            DB::raw('group_concat(nilai.keterampilan) as K'),
            DB::raw('group_concat(nilai.sikap) as S'),
            // DB::raw("array_to_string(array_agg(mapel.nama_mapel), ',') as nama_mapel"),
            // DB::raw("array_to_string(array_agg(nilai.pengetahuan), ',') as P"),
            // DB::raw("array_to_string(array_agg(nilai.keterampilan), ',') as K"),
            // DB::raw("array_to_string(array_agg(nilai.sikap), ',') as S"),
        )->join('mapel', 'nilai.id_mapel', '=', 'mapel.id_mapel')
        ->join('siswa', 'nilai.nis', '=', 'siswa.nis')
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->join('rombel', 'kelas.kode_rombel', '=', 'rombel.kode_rombel')
        ->groupBy('siswa.nis')
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

        return view('pages.lihat-ledger',compact('nama_rombel','mapels','rombels','datas',
            'kode_rombel','tahun_ajaran'));
    }

    public function cetak_ledger(Request $request)
    {
        $kode_rombel = $request->kode_rombel;
        $tahun_ajaran= $request->tahun_ajaran;
        $datas = Nilai::select(
            'siswa.nis',
            'siswa.nama',
            DB::raw('group_concat(mapel.nama_mapel) as nama_mapel'),
            DB::raw('group_concat(nilai.pengetahuan) as P'),
            DB::raw('group_concat(nilai.keterampilan) as K'),
            DB::raw('group_concat(nilai.sikap) as S'),
            // DB::raw("array_to_string(array_agg(mapel.nama_mapel), ',') as nama_mapel"),
            // DB::raw("array_to_string(array_agg(nilai.pengetahuan), ',') as P"),
            // DB::raw("array_to_string(array_agg(nilai.keterampilan), ',') as K"),
            // DB::raw("array_to_string(array_agg(nilai.sikap), ',') as S"),
        )->join('mapel', 'nilai.id_mapel', '=', 'mapel.id_mapel')
        ->join('siswa', 'nilai.nis', '=', 'siswa.nis')
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->join('rombel', 'kelas.kode_rombel', '=', 'rombel.kode_rombel')
        ->groupBy('siswa.nis')
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

        $pdf = PDF::loadview('cetak.ledger',compact('nama_rombel','mapels','rombels','datas','kode_rombel','tahun_ajaran'));
        // $pdf->setPaper('a4', 'landscape');
        $pdf->setPaper([0, 0, 396.85 ,685.98 ], 'landscape');
        return $pdf->download('ledger-pdf.pdf');
    }

    public function see_ledger(Request $request)
    {
        $kode_rombel = 1;
        $tahun_ajaran= '2021/2022';
        $datas = Nilai::select(
            'siswa.nis',
            'siswa.nama',
            DB::raw('group_concat(mapel.nama_mapel) as nama_mapel'),
            DB::raw('group_concat(nilai.pengetahuan) as P'),
            DB::raw('group_concat(nilai.keterampilan) as K'),
            DB::raw('group_concat(nilai.sikap) as S')
        )->join('mapel', 'nilai.id_mapel', '=', 'mapel.id_mapel')
        ->join('siswa', 'nilai.nis', '=', 'siswa.nis')
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->join('rombel', 'kelas.kode_rombel', '=', 'rombel.kode_rombel')
        ->groupBy('siswa.nis')
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

        return view('cetak.ledger',compact('nama_rombel','mapels','rombels','datas','kode_rombel','tahun_ajaran'));
  
    }

    

    public function lihat_nilai_siswa(Request $r){
         $nis = Auth::guard('siswa')->id();
         $semesterPilihan = $r->semester;
         $semesters = Nilai::where('nis',$nis)->groupBy('semester')->get()->pluck('semester');

         $nilais = Nilai::select(
            'nilai.nis',
            'mapel.nama_mapel',
            'guru.nama',
            'mapel.KKM',
            'nilai.tahun_ajaran',
            'nilai.semester',
            'nilai.pengetahuan',
            'nilai.keterampilan',
            'nilai.sikap'
         )->leftJoin('mapel','mapel.id_mapel','=','nilai.id_mapel')
         ->leftJoin('beban_ajar','mapel.id_mapel','=','beban_ajar.id_mapel')
         ->leftJoin('guru','guru.kode_guru','=','beban_ajar.kode_guru')
         ->where('nis',$nis)->where('semester',$semesterPilihan)->get();

         $ekskul = Ekstrakulikuler::where('nis',$nis)->where('semester',$semesterPilihan)->get();

         $absensi = Absensi::where('nis',$nis)->where('semester',$semesterPilihan)->first();
         $kepribadian = Kepribadian::where('nis',$nis)->where('semester',$semesterPilihan)->first();

         if($ekskul == null){
            $ekskul = false;
         }
         if($absensi  == null){
            $absensi = false;
         }
         if($kepribadian == null){
            $kepribadian = false;
            
         }
         $identitas = Siswa::select(
                'siswa.nama',
                'siswa.nis',
                'kelas.nama_kelas',
        )->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
         ->where('siswa.nis', $nis)->first();

         return view('pages.lihat-nilai',compact('nilais','semesters','identitas','semesterPilihan','absensi','ekskul','kepribadian'));
    }

    public function cetak_pdf(Request $r)
    {
        $nis = Auth::guard('siswa')->id();
         $semesterPilihan = $r->semester;
         $semesters = Nilai::where('nis',$nis)->groupBy('semester')->get()->pluck('semester');

         $nilais = Nilai::select(
            'nilai.nis',
            'mapel.nama_mapel',
            'guru.nama',
            'mapel.KKM',
            'nilai.tahun_ajaran',
            'nilai.semester',
            'nilai.pengetahuan',
            'nilai.keterampilan',
            'nilai.sikap'
         )->leftJoin('mapel','mapel.id_mapel','=','nilai.id_mapel')
         ->leftJoin('beban_ajar','mapel.id_mapel','=','beban_ajar.id_mapel')
         ->leftJoin('guru','guru.kode_guru','=','beban_ajar.kode_guru')
         ->where('nis',$nis)->where('semester',$semesterPilihan)->get();

         $ekskul = Ekstrakulikuler::where('nis',$nis)->where('semester',$semesterPilihan)->get();

         $absensi = Absensi::where('nis',$nis)->where('semester',$semesterPilihan)->first();
         $kepribadian = Kepribadian::where('nis',$nis)->where('semester',$semesterPilihan)->first();

         if($ekskul == null){
            $ekskul = false;
         }
         if($absensi  == null){
            $absensi = false;
         }
         if($kepribadian == null){
            $kepribadian = false;
            
         }
         $identitas = Siswa::select(
                'siswa.nama',
                'siswa.nis',
                'kelas.nama_kelas',
        )->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
         ->where('siswa.nis', $nis)->first();
 
        $pdf = PDF::loadview('cetak.rapot',compact('nilais','semesters','identitas','semesterPilihan','absensi','ekskul','kepribadian'));
        return $pdf->download('raport-pdf.pdf');
    }


    
    
}
