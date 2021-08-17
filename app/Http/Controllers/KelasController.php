<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
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
                'guru.kode_guru',
                'rombel.kode_rombel',
                'rombel.nama_rombel',
                'rombel.jurusan',
        )->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
         ->join('guru', 'guru.kode_guru', '=', 'kelas.kode_guru')->paginate(10);

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
            return redirect()->to('/kelas?id='.$id_kelas);
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
        $dataKelas->kode_guru = $request->kode_guru;  
        $dataKelas->nama_kelas = $request->nama_kelas; 
        $dataKelas->save();
        
        return response()->json(['status' => array('code' => 200, 'message' => 'Success store new kelas.'),
        ], 200);
    }

    public function ganti_walikelas(Request $request)
    {
         $findKelas = Kelas::where('id_kelas', $request->id_kelas)->first();
            if($findKelas){
                $data = [
                    'kode_guru' => $request->kode_guru,
                ];
                Kelas::where('id_kelas',$request->id_kelas)->update($data);
                return response()->json([
                    'status'        => array('code' => 200, 'message' => 'Success update new kelas.'),
                ], 200);
            }
        return response()->json($siswa, 200);
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
