@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">
           <a href="{{ url("/mapel") }}" class="btn btn-success mr-3"> Kembali</a>
        </div>

<!-- Form edit mapel -->
        @if ($param === 'edit') 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-mapel/$mapel->id_mapel") }}" >
            @csrf
            <h2>Ubah Daftar Mata Pelajaran</h2>
            <hr>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama Mapel</label>
              <input type="text" name="nama_mapel" class="form-control" id="exampleInputPassword2" required placeholder="" value="{{$mapel->nama_mapel}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">KKM</label>
              <input type="text" name="KKM" class="form-control" id="exampleInputPassword3" placeholder="" value="{{$mapel->KKM}}">
            </div>
            
            <button class="btn btn-success" type="submit" onclick="{{url('/mapel')}}">Ubah Data</button>
          </form>
        </div>
        @else 

  <!-- Form Tambah Mapel -->
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/tambah-mapel") }}">
            @csrf
            <h2>Tambah Mata Pelajaran</h2><hr>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama Mapel</label>
              <input type="text" name="nama_mapel" class="form-control" id="exampleInputPassword2" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">KKM</label>
              <input type="text" name="KKM" class="form-control" id="exampleInputPassword3" placeholder="">
            </div>
            <div class="form-group">
              <label >Pilih Rombel</label>
              <select name="kode_rombel" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_rombel as $rombel)
                  <option value="{{$rombel->kode_rombel}}">{{$rombel->nama_rombel . " " .$rombel->jurusan }}</option>
                @endforeach
              </select>
            </div>
            <button class="btn btn-success" type="submit">Simpan Data</button>
          </form>
        </div>
        @endif


        
    </div>
@stop