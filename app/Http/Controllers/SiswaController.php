<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $all_siswa = Siswa::paginate(10);
        return view('pages.siswa',compact('all_siswa'));
    }

     public function form_siswa(Request $request,$param)
    {
        if($param == "edit"){
            $siswa = Siswa::find($request->id);
            return view('pages.form-siswa',compact('siswa','param'));
        }

        return view('pages.form-siswa',compact('param'));
    }

    public function tambah_siswa(Request $request)
    {
        $data = new Siswa;   
        $data->nis = $request->nis;       
        $data->nama = $request->nama;  
        $data->alamat = $request->alamat;  
        $data->id_kelas = '1';  
        $data->ttl = $request->ttl;  
        $data->nomor = $request->nomor;  
        $data->email = $request->email;
        $data->password = Hash::make($request->password); 
        $data->save();   
        return redirect()->to('/siswa');
    }

    public function hapus_siswa(Request $request,$id)
    {
        $findsiswa = Siswa::where('nis', $id)->first();
        if($findsiswa){
            Siswa::where('nis',$id)->delete();
            return redirect()->to('/siswa');
        }
    }
    
    public function edit_siswa(Request $request,$id)
    {
        $findsiswa = Siswa::where('nis', $id)->first();
        if($findsiswa){
            $datasiswa = [
                'nis' => $request->nis,       
                'nama' => $request->nama,  
                'alamat' => $request->alamat,  
                'ttl' => $request->ttl,  
                'nomor' => $request->nomor,  
                'email' => $request->email,
            ];
            Siswa::where('nis',$id)->update($datasiswa);
            return redirect()->to('/siswa');
            // return response()->json([
            //     'status'        => array('code' => 200, 'message' => 'Success update new siswa.'),
            // ], 200);
        }
    }

}
