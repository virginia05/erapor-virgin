<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kepribadian;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $params)
    {
        $kelas = Kelas::select(
                'kelas.nama_kelas',
                'kelas.id_kelas',
                'guru.nama',
                'guru.nuptk',
                'rombel.kode_rombel',
                'rombel.nama_rombel',
                'rombel.jurusan',
        )->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
         ->leftJoin('guru', 'guru.nuptk', '=', 'kelas.nuptk')->paginate(10);

         $all_rombel = Rombel::all();
         $all_kelas = Kelas::all();
         $pilihanKelas = Kelas::select(
                'kelas.id_kelas',
                'kelas.nama_kelas',
                'siswa.nis',
                'siswa.nama',
        )->join('siswa', 'siswa.id_kelas', '=', 'kelas.id_kelas')
         ->where('kelas.id_kelas',$params->id)->paginate(10);

         $id_kelas = $params->id;
         $siswas = Siswa::select('nis','nama')->where('id_kelas',1)->get();
         $all_guru = Guru::where('jenis_ptk','Guru Mapel')->get();

        return view('pages.kelas',compact('kelas','all_rombel','all_guru','all_kelas','pilihanKelas','id_kelas','siswas'));
    }

    public function kelola_siswa(Request $params,$nis,$id_kelas)
    {
        
        $findsiswa = Siswa::where('nis', $nis)->first();
        if($findsiswa){
            $datasiswa = [
                'id_kelas' => $id_kelas
            ];
            Siswa::where('nis',$nis)->update($datasiswa);
        }
        $findsiswaAgain = Siswa::where('nis', $nis)->first();
        $findKategoriMapel = Kelas::select(
                'rombel.kategori_mapel',
        )->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
         ->join('siswa', 'siswa.id_kelas', '=', 'kelas.id_kelas')
         ->where('siswa.nis',$nis)->first();

        $mapels = json_decode($findKategoriMapel->kategori_mapel,true);
        if($mapels==null){
            $mapels = [];
        }

        $get_tahun_mulai = intval(substr($findsiswaAgain->tahun_mulai,0,4));
        $get_tahun_skrng = intval(date('Y'));
        
        $hasil = $get_tahun_skrng - $get_tahun_mulai;
        if($hasil == 0 || $hasil >= 9){
            $hasil = 1;
        }

        foreach ($mapels as $key => $value) {
            $id = Mapel::select('id_mapel')->where('nama_mapel',$value)->first();
            $dataNilai = new Nilai;
            $dataNilai->semester = $hasil;       
            $dataNilai->tahun_ajaran = date('Y')."/".date('Y',strtotime('+1 year'));  
            $dataNilai->id_mapel = $id->id_mapel; 
            $dataNilai->nis = $nis; 
            $dataNilai->save();
        }

        return redirect()->to('/kelas?id='.$id_kelas)->with('message','Data Berhasil Ditambahkan');

    }

    public function hapus_kelasiswa(Request $request,$itemKelas)
    {
        $findsiswa = Siswa::where('nis', $itemKelas)->first();
        if($findsiswa){
            Siswa::where('nis',$itemKelas)->delete();
            return redirect()->to('/kelas')->with('error','Data Dihapus');
        }
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
        $dataKelas = new Kelas;
        $dataKelas->kode_rombel = $request->kode_rombel;       
        $dataKelas->nuptk = $request->nuptk;  
        $dataKelas->nama_kelas = $request->nama_kelas; 
        $dataKelas->save();
        return redirect()->to('/kelas')->with('message','Data Berhasil Ditambahkan');
    }

    public function ganti_walikelas(Request $request)
    {
         $findKelas = Kelas::where('id_kelas', $request->id_kelas)->first();
            if($findKelas){
                $data = [
                    'nuptk' => $request->nuptk,
                ];
                Kelas::where('id_kelas',$request->id_kelas)->update($data);
                return redirect()->to('/kelas')->with('message','Data Berhasil Ditambahkan');
            }
        return redirect()->to('/kelas')->with('error','Data Tidak Berhasil Ditambahkan');
        
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
