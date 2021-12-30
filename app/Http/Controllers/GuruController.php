<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use PDF;

class GuruController extends Controller
{
    public function index()
    {
        $all_guru = Guru::paginate(10);
        return view('pages.guru',compact('all_guru'));
    }

    public function lihat_guru()
    {
        $all_guru = Guru::paginate(10);
        return view('pages.lihat-guru',compact('all_guru'));
    }

    public function cetak_guru()
    {
        $all_guru = Guru::all();
        $pdf = PDF::loadview('cetak.guru',compact('all_guru'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-guru-pdf.pdf');
    }

    public function form_guru(Request $request,$param)
    {
        if($param == "edit"){
            $guru = Guru::find($request->id);
            return view('pages.form-guru',compact('guru','param'));
        }
        return view('pages.form-guru',compact('param'));
    }

    public function tambah_guru(Request $request)
    {
        $data = new Guru;
        $data->nuptk = $request->nuptk;       
        $data->nama = $request->nama;
        $data->gender = $request->gender;
        $data->alamat = $request->alamat;  
        $data->tgl_lahir = $request->tgl_lahir;  
        $data->nomor = $request->nomor;  
        $data->email = $request->email;  
        $data->status_pegawai = $request->status_pegawai;  
        $data->jenis_ptk = $request->jenis_ptk;  
        $data->gelar = $request->gelar;  
        $data->sertifikasi = $request->sertifikasi;  
        $data->password = Hash::make($request->password); 
        $data->save();   
        return redirect()->to('/guru')->with('message','Data Berhasil Ditambahkan');

    }

    public function hapus_guru(Request $request,$id)
    {
        $findGuru = Guru::where('nuptk', $id)->first();
        if($findGuru){
            Guru::where('nuptk',$id)->delete();
            return redirect()->to('/guru')->with('error','Data Dihapus');
        }
    }
    
    public function edit_guru(Request $request,$id)
    {
        $findGuru = Guru::where('nuptk', $id)->first();
        if($findGuru){
            $dataGuru = [
                'nama' => $request->nama, 
                'gender' => $request->gender, 
                'alamat' => $request->alamat,  
                'tgl_lahir' => $request->tgl_lahir,  
                'nomor' => $request->nomor,  
                'email' => $request->email,  
                'status_pegawai' => $request->status_pegawai,  
                'jenis_ptk' => $request->jenis_ptk,  
                'gelar' => $request->gelar,  
                'sertifikasi' => $request->sertifikasi
            ];
            Guru::where('nuptk',$id)->update($dataGuru);
            return redirect()->to('/guru')->with('warning','Data Diubah');
            // return response()->json([
            //     'status'        => array('code' => 200, 'message' => 'Success update new guru.'),
            // ], 200);
        }
    }

    public function edit_guru_profile(Request $request,$id)
    {
        $findGuru = Guru::where('nuptk', $id)->first();
        if($findGuru){
            $dataGuru = [
                'gender' => $request->gender,
                'alamat' => $request->alamat,  
                'tgl_lahir' => $request->tgl_lahir,  
                'nomor' => $request->nomor,  
                'email' => $request->email,  
                'gelar' => $request->gelar,  
                'sertifikasi' => $request->sertifikasi
            ];
            if($request->password){
                $dataGuru = [
                    'gender' => $request->gender,
                    'alamat' => $request->alamat,  
                    'tgl_lahir' => $request->tgl_lahir,  
                    'nomor' => $request->nomor,  
                    'email' => $request->email,  
                    'gelar' => $request->gelar,  
                    'sertifikasi' => $request->sertifikasi,
                    'password' => Hash::make($request->password)
                ];
            }
            Guru::where('nuptk',$id)->update($dataGuru);
            return redirect()->to('/profile')->with('warning','Data Diubah');
        }
    }


    // protected $redirectTo = '/menu-guru';
    // public function __construct()
    // {
    //     $this->middleware('guest:guru')->except('logout');
    // }
    // public function showLoginForm()
    // {
    //     return view('pages.login');
    // }
    // public function username()
    // {
    //     return 'nuptk';
    // }
    // protected function guard()
    // {
    //     return Auth::guard('guru');
    // }
}
