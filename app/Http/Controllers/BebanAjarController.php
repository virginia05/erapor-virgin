<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BebanAjar;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Rombel;
use PDF;

class BebanAjarController extends Controller
{
    public function index(Request $r)
    {
        $datas = BebanAjar::select(
            'beban_ajar.id',
            'guru.nama',
            'mapel.nama_mapel',
            'kelas.nama_kelas',
            'rombel.kode_rombel')
            ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
            ->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
            ->join('mapel', 'mapel.id_mapel', '=', 'beban_ajar.id_mapel')
            ->join('guru', 'guru.nuptk', '=', 'beban_ajar.nuptk')
            ->paginate(7);
        $all_rombel = Rombel::all();

        if($r->kode_rombel){
           $datas = BebanAjar::select(
            'beban_ajar.id',
            'guru.nama',
            'mapel.nama_mapel',
            'kelas.nama_kelas',
            'rombel.kode_rombel')
            ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
            ->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
            ->join('mapel', 'mapel.id_mapel', '=', 'beban_ajar.id_mapel')
            ->join('guru', 'guru.nuptk', '=', 'beban_ajar.nuptk')
            ->where('rombel.kode_rombel',$r->kode_rombel)->paginate(7);
        }

        // return view(print_r($r->kode_rombel));

        return view('pages.bebanAjar',compact('datas','all_rombel'));
    }

    public function lihat_beban(Request $r)
    {
        $datas = BebanAjar::select(
            'beban_ajar.id',
            'guru.nama',
            'mapel.nama_mapel',
            'kelas.nama_kelas',
            'rombel.kode_rombel')
            ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
            ->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
            ->join('mapel', 'mapel.id_mapel', '=', 'beban_ajar.id_mapel')
            ->join('guru', 'guru.nuptk', '=', 'beban_ajar.nuptk')
            ->paginate(7);
        $all_rombel = Rombel::all();

        if($r->kode_rombel){
           $datas = BebanAjar::select(
            'beban_ajar.id',
            'guru.nama',
            'mapel.nama_mapel',
            'kelas.nama_kelas',
            'rombel.kode_rombel')
            ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
            ->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
            ->join('mapel', 'mapel.id_mapel', '=', 'beban_ajar.id_mapel')
            ->join('guru', 'guru.nuptk', '=', 'beban_ajar.nuptk')
            ->where('rombel.kode_rombel',$r->kode_rombel)->paginate(7);
        }

        // return view(print_r($r->kode_rombel));

        return view('pages.lihat-beban',compact('datas','all_rombel'));
    }

    public function cetak_beban(Request $r)
    {
        $datas = BebanAjar::select(
            'beban_ajar.id',
            'guru.nama',
            'mapel.nama_mapel',
            'kelas.nama_kelas',
            'rombel.kode_rombel')
            ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
            ->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
            ->join('mapel', 'mapel.id_mapel', '=', 'beban_ajar.id_mapel')
            ->join('guru', 'guru.nuptk', '=', 'beban_ajar.nuptk')
            ->paginate(7);
        $all_rombel = Rombel::all();

        if($r->kode_rombel){
           $datas = BebanAjar::select(
            'beban_ajar.id',
            'guru.nama',
            'mapel.nama_mapel',
            'kelas.nama_kelas',
            'rombel.kode_rombel')
            ->join('kelas', 'kelas.id_kelas', '=', 'beban_ajar.id_kelas')
            ->join('rombel', 'rombel.kode_rombel', '=', 'kelas.kode_rombel')
            ->join('mapel', 'mapel.id_mapel', '=', 'beban_ajar.id_mapel')
            ->join('guru', 'guru.nuptk', '=', 'beban_ajar.nuptk')
            ->where('rombel.kode_rombel',$r->kode_rombel)->get();
        }

        $pdf = PDF::loadview('cetak.beban',compact('datas','all_rombel'));
        return $pdf->download('laporan-beban-pdf.pdf');
    }

    

    public function form_beban(Request $request,$param)
    {
        $all_kelas = Kelas::all();
        $all_guru = Guru::all();
        $all_mapel = Mapel::all();
        if($param == "edit"){
            $beban = BebanAjar::find($request->id);
            return view('pages.form-beban',compact('beban','param','all_kelas','all_guru','all_mapel'));
        }

        return view('pages.form-beban',compact('param','all_kelas','all_guru','all_mapel'));

    }

    public function tambah_beban(Request $request)
    {
        $data = new BebanAjar;   
        $data->nuptk = $request->nuptk;       
        $data->id_kelas = $request->id_kelas;  
        $data->id_mapel = $request->id_mapel;
        $data->save();   
        return redirect()->to('/beban')->with('message','Data Berhasil Ditambahkan');
    }

    public function reset()
    {
        // reset siswa id_kelas di set 1
        // hapus all row beban_ajar
        // tabel kelas id guru set id = 1 
        BebanAjar::truncate();
        $kelas = Kelas::all();
        Kelas::query()->update(['nuptk' => NULL]);
        Siswa::query()->update(['id_kelas' => 1]);

        return redirect()->to('/kelas');
    }



    public function hapus_beban(Request $request,$id)
    {
        $findbeban = BebanAjar::where('id', $id)->first();
        if($findbeban){
            BebanAjar::where('id',$id)->delete();
            return redirect()->to('/beban')->with('error','Data Dihapus');
        }
    }
    
    public function edit_beban(Request $request,$id)
    {
        $findbeban = BebanAjar::where('id', $id)->first();
        if($findbeban){
            $databeban = [
                'nuptk' => $request->nuptk,       
                'id_kelas' => $request->id_kelas,  
                'id_mapel' => $request->id_mapel,
            ];
            BebanAjar::where('id',$id)->update($databeban);
            return redirect()->to('/beban')->with('warning','Data Diubah');
        }
    }
}
