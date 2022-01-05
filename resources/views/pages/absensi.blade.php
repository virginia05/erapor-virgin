@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <h2>Kehadiran Siswa</h2>
        <hr>

          <div class="dropdown mx-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Kelas
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              @foreach ($datas as $item)
                 <li><a class="dropdown-item" href="{{ url('/absensi?id_kelas='.$item->id_kelas) }}">{{ $item->nama_kelas }}</a></li>
              @endforeach
            </ul>
          </div>
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/tambah-absensi") }}">
            @csrf
             <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">

             <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Siswa</label>
                <select name="nis" class="form-control" id="exampleFormControlSelect1">
                  @foreach ($dataSiswa as $itemSiswa)
                    <option value="{{ $itemSiswa->nis }}">{{ $itemSiswa->nama }}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Semester</label>
              <input type="text" name="semester" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Sakit</label>
              <input type="text" name="sakit" class="form-control" id="exampleInputPassword2" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Izin</label>
              <input type="text" name="izin" class="form-control" id="exampleInputPassword3" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Alfa</label>
              <input type="text" name="alfa" class="form-control" id="exampleInputPassword4" required placeholder="">
            </div>
            
              <button class="btn btn-success" type="submit">Simpan</button>
          </form>
        </div>


        
    </div>
@stop