@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">

           <a href="{{ url("/beban") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
        </div>
        <hr>
        @if ($param === 'edit') 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-beban/$beban->id") }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NIS</label>
              <input type="text" name="nis" class="form-control" id="exampleInputPassword1" placeholder="" value="{{$beban->nis}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" value="{{$beban->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="" value="{{$beban->alamat}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="text" name="ttl" class="form-control" id="exampleInputPassword4" required placeholder="" value="{{$beban->ttl}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Telp</label>
              <input type="text" name="nomor" class="form-control" id="exampleInputPassword5" placeholder="" value="{{$beban->nomor}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword6">Email</label>
              <input type="text" name="email" class="form-control" id="exampleInputPassword6" placeholder="" value="{{$beban->email}}">
            </div>
            <button class="btn btn-success" type="submit" onclick="{{url('/beban')}}">Simpan</button>
          </form>
        </div>
        @else 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/tambah-beban") }}">
            @csrf
            <div class="form-group">
              <label >Pilih Guru</label>
              <select name="kode_guru" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_guru as $guru)
                  <option value="{{$guru->kode_guru}}">{{$guru->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Pilih Mapel</label>
              <select name="id_mapel" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_mapel as $mapel)
                   <option value="{{$mapel->id_mapel}}">{{$mapel->nama_mapel }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Pilih Kelas</label>
              <select name="id_kelas" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_kelas as $kelas)
                  @if ($kelas->id_kelas == 1)
                    @continue;
                  @else
                   <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <button class="btn btn-success" type="submit">Simpan</button>
          </form>
        </div>
        @endif


        
    </div>
@stop