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
        $latest = Guru::latest()->first();
        if($latest){
            $kode_guru = $latest->kode_guru + 1;
        }else{
            $kode_guru = "1";
        }
        $data = new Guru;
        $data->kode_guru = $kode_guru;       
        $data->nuptk = $request->nuptk;       
        $data->nama = $request->nama;  
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
        return redirect()->to('/guru');

    }

    public function hapus_guru(Request $request,$id)
    {
        $findGuru = Guru::where('kode_guru', $id)->first();
        if($findGuru){
            Guru::where('kode_guru',$id)->delete();
            return redirect()->to('/guru');
        }
    }
    
    public function edit_guru(Request $request,$id)
    {
        $findGuru = Guru::where('kode_guru', $id)->first();
        if($findGuru){
            $dataGuru = [
                'nuptk' => $request->nuptk,       
                'nama' => $request->nama,  
                'alamat' => $request->alamat,  
                'tgl_lahir' => $request->tgl_lahir,  
                'nomor' => $request->nomor,  
                'email' => $request->email,  
                'status_pegawai' => $request->status_pegawai,  
                'jenis_ptk' => $request->jenis_ptk,  
                'gelar' => $request->gelar,  
                'sertifikasi' => $request->sertifikasi
            ];
            Guru::where('kode_guru',$id)->update($dataGuru);
            return redirect()->to('/guru');
            // return response()->json([
            //     'status'        => array('code' => 200, 'message' => 'Success update new guru.'),
            // ], 200);
        }
    }

    public function edit_guru_profile(Request $request,$id)
    {
        $findGuru = Guru::where('kode_guru', $id)->first();
        if($findGuru){
            $dataGuru = [
                'alamat' => $request->alamat,  
                'tgl_lahir' => $request->tgl_lahir,  
                'nomor' => $request->nomor,  
                'email' => $request->email,  
                'gelar' => $request->gelar,  
                'sertifikasi' => $request->sertifikasi
            ];
            Guru::where('kode_guru',$id)->update($dataGuru);
            return redirect()->to('/profile');
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
    //     return 'kode_guru';
    // }
    // protected function guard()
    // {
    //     return Auth::guard('guru');
    // }
}
