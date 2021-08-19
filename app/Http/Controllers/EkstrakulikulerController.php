<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Siswa;

use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nis)
    {
        $datas = Ekstrakulikuler::where('nis',$nis)->orderBy('semester','asc')->get();

        return view('pages.ekskul',compact('nis','datas'));
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

        $dataKepribadian = new Ekstrakulikuler;
        $dataKepribadian->semester = $hasil;   
        $dataKepribadian->nis = $request->nis; 
        $dataKepribadian->predikat = $request->predikat; 
        $dataKepribadian->nama_eks = $request->nama_eks;

        $dataKepribadian->save();
        return redirect()->to('/form-ekskul/'.$request->nis);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findEkstrakulikuler = Ekstrakulikuler::find($id);
        if($findEkstrakulikuler){      
            $data = [
                'predikat' => $request->predikat,
            ];
            Ekstrakulikuler::where('id',$id)->update($data);
        }
        return redirect()->to('/form-ekskul/'.$findEkstrakulikuler->nis);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekstrakulikuler $ekstrakulikuler,$id)
    {
        $data = Ekstrakulikuler::where('id', $id)->first();
        if($data){
            Ekstrakulikuler::where('id',$id)->delete();
            return redirect()->to('/form-ekskul/'.$data->nis);
        }
    }
}
