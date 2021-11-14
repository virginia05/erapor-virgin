<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Rombel;

class MapelController extends Controller
{
    public function index()
    {
        $datas = Mapel::paginate(10);
        $all_rombel = Rombel::all();
        $mapels = Mapel::pluck('nama_mapel');
        $mapels = json_decode(json_encode($mapels),true);

        return view('pages.mapel',compact('datas','all_rombel','mapels'));
    }

    public function form_mapel(Request $request,$param)
    {
        $all_rombel = Rombel::all();

        if($param == "edit"){
            $mapel = Mapel::find($request->id);
            return view('pages.form-mapel',compact('mapel','param','all_rombel'));
        }

        return view('pages.form-mapel',compact('param','all_rombel'));
    }

    public function tambah_mapel(Request $request)
    {
        $data = new Mapel;    
        $data->nama_mapel = $request->nama_mapel;  
        $data->KKM = $request->KKM;  
        $data->save();   

        $mapelsObj = Rombel::select('kategori_mapel')->where('kode_rombel',$request->kode_rombel)->first();
        $mapels = json_decode($mapelsObj->kategori_mapel,true);
        if($mapels == null){
            $new_kategori = array($request->nama_mapel);
        }else{
            array_push($mapels,$request->nama_mapel);
            $new_kategori = $mapels;
        }

        $findRombel = Rombel::where('kode_rombel', $request->kode_rombel)->first();
        if($findRombel){
            Rombel::where('kode_rombel',$request->kode_rombel)->update([       
                'kategori_mapel' => json_encode($new_kategori,JSON_FORCE_OBJECT),
            ]);
        }
        // return view(var_dump($mapelsObj->kategori_mapel));

        return redirect()->to('/mapel')->with('message','Data Berhasil Ditambahkan');
    }

    public function hapus_mapel(Request $request,$id)
    {
        $findmapel = Mapel::where('id_mapel', $id)->first();

        $get_rombels = Rombel::all();
        for ($i=0; $i < count($get_rombels); $i++) { 
            $convertMapel = json_decode($get_rombels[$i]->kategori_mapel,true);
            if($convertMapel == null){
                $convertMapel = array();
            }
            $cari = array_search($findmapel->nama_mapel, $convertMapel);
            if(in_array($findmapel->nama_mapel, $convertMapel)){
                array_splice($convertMapel, $cari,1);
                $findRombelAgain = Rombel::where('kode_rombel', $get_rombels[$i]->kode_rombel)->first();
                if($findRombelAgain){
                    Rombel::where('kode_rombel',$get_rombels[$i]->kode_rombel)->update([
                        'kategori_mapel' => json_encode($convertMapel,JSON_FORCE_OBJECT),
                    ]);
                }
            }
        }
 
        if($findmapel){
            Mapel::where('id_mapel',$id)->delete();
            return redirect()->to('/mapel')->with('error','Data Dihapus');
        }
    }
    
    public function edit_mapel(Request $request,$id)
    {
        $findmapel = Mapel::where('id_mapel', $id)->first();

        $get_rombels = Rombel::all();
        for ($i=0; $i < count($get_rombels); $i++) { 
            $convertMapel = json_decode($get_rombels[$i]->kategori_mapel,true);
            if($convertMapel == null){
                $convertMapel = array();
            }
            $cari = array_search($findmapel->nama_mapel, $convertMapel);
            if(in_array($findmapel->nama_mapel, $convertMapel)){
                // disini perbedaaanya                   |
                array_splice($convertMapel, $cari,1,  $request->nama_mapel);
                $findRombelAgain = Rombel::where('kode_rombel', $get_rombels[$i]->kode_rombel)->first();
                if($findRombelAgain){
                    Rombel::where('kode_rombel',$get_rombels[$i]->kode_rombel)->update([
                        'kategori_mapel' => json_encode($convertMapel,JSON_FORCE_OBJECT),
                    ]);
                }
            }
        }

        if($findmapel){
            $datamapel = [       
                'nama_mapel' => $request->nama_mapel,  
                'KKM' => $request->KKM,  
            ];
            Mapel::where('id_mapel',$id)->update($datamapel);
            return redirect()->to('/mapel')->with('warning','Data Diubah');
        }
    }

    public function tambah_kategori(Request $request,$nama_mapel,$kode_rombel){
        $mapelsObj = Rombel::select('kategori_mapel')->where('kode_rombel',$kode_rombel)->first();
        $mapels = json_decode($mapelsObj->kategori_mapel,true);
        if($mapels == null){
            $new_kategori = array($nama_mapel);
        }else{
            array_push($mapels,$nama_mapel);
            $new_kategori = $mapels;
        }

        $findRombel = Rombel::where('kode_rombel', $kode_rombel)->first();
        if($findRombel){
            Rombel::where('kode_rombel',$kode_rombel)->update([       
                'kategori_mapel' => json_encode($new_kategori,JSON_FORCE_OBJECT),
            ]);
        }
        return redirect()->to('/mapel')->with('message','Data Berhasil Ditambahkan');
    }

    public function hapus_kategori(Request $request,$nama_mapel,$kode_rombel){
        $mapelsObj = Rombel::select('kategori_mapel')->where('kode_rombel',$kode_rombel)->first();
        
        $convertMapel = json_decode($mapelsObj->kategori_mapel,true);
        if($convertMapel == null){
            $convertMapel = array();
        }
        $cari = array_search($nama_mapel, $convertMapel);
        if(in_array($nama_mapel, $convertMapel)){
            array_splice($convertMapel, $cari,1);
            $findRombelAgain = Rombel::where('kode_rombel', $kode_rombel)->first();
        }
        if($findRombelAgain){
            Rombel::where('kode_rombel',$kode_rombel)->update([
                'kategori_mapel' => json_encode($convertMapel,JSON_FORCE_OBJECT),
            ]);
        }
        return redirect()->to('/mapel')->with('error','Data Dihapus');
    }

    
}
