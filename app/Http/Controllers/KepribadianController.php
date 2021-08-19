<?php

namespace App\Http\Controllers;

use App\Models\Kepribadian;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KepribadianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nis)
    {
        $datas = Kepribadian::where('nis',$nis)->orderBy('semester','asc')->get();

        return view('pages.kepribadian',compact('nis','datas'));
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
        $findsiswa = Siswa::where('nis', $request->nis)->first();

        $get_tahun_mulai = intval(substr($findsiswa->tahun_mulai,0,4));
        $get_tahun_skrng = intval(date('Y'));
        
        $hasil = $get_tahun_skrng - $get_tahun_mulai;
        if($hasil == 0 || $hasil >= 9){
            $hasil = 1;
        }

        $dataKepribadian = new Kepribadian;
        $dataKepribadian->semester = $hasil;       
        $dataKepribadian->tahun_ajaran = date('Y')."/".date('Y',strtotime('+1 year'));  
        $dataKepribadian->nis = $request->nis; 
        $dataKepribadian->nilai_kerajinan = $request->nilai_kerajinan; 
        $dataKepribadian->nilai_kerapihan = $request->nilai_kerapihan; 
        $dataKepribadian->nilai_kelakuan = $request->nilai_kelakuan; 

        $dataKepribadian->save();
        return redirect()->to('/form-kepribadian/'.$request->nis);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepribadian  $kepribadian
     * @return \Illuminate\Http\Response
     */
    public function show(Kepribadian $kepribadian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kepribadian  $kepribadian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepribadian $kepribadian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kepribadian  $kepribadian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findkepribadian = Kepribadian::find($id);
        if($findkepribadian){      
            $data = [
                'nilai_kerajinan' => $request->nilai_kerajinan,
                'nilai_kelakuan' => $request->nilai_kelakuan,
                'nilai_kerapihan' => $request->nilai_kerapihan,
            ];
            Kepribadian::where('id',$id)->update($data);
        }
        return redirect()->to('/form-kepribadian/'.$request->nis);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepribadian  $kepribadian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepribadian $kepribadian)
    {
        //
    }
}
