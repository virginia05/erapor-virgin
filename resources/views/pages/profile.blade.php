@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">

        </div>
        <hr>
        @if (Auth::check()) 
        @php
          $guru = Auth::user();
        @endphp
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-guru-profile/$guru->kode_guru") }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NUPTK</label>
              <input type="text" name="nuptk" class="form-control" id="exampleInputPassword1" placeholder="" disabled="true" value="{{$guru->nuptk}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" value="{{$guru->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="" value="{{$guru->alamat}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="text" name="tgl_lahir" class="form-control" id="exampleInputPassword4" required placeholder="" value="{{$guru->tgl_lahir}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Telp</label>
              <input type="text" name="nomor" class="form-control" id="exampleInputPassword5" placeholder="" value="{{$guru->nomor}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword6">Email</label>
              <input type="text" name="email" class="form-control" id="exampleInputPassword6" placeholder="" value="{{$guru->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword9">Gelar</label>
              <input type="text" name="gelar" class="form-control" id="exampleInputPassword9"  placeholder="" value="{{$guru->gelar}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword10">Sertifikasi</label>
              <input type="text" name="sertifikasi" class="form-control" id="exampleInputPassword10"  placeholder="" value="{{$guru->sertifikasi}}">
            </div>
              <button class="btn btn-success" type="submit" onclick="{{url('/guru')}}">Simpan</button>
          </form>
        </div>
        @else
        @php
          $siswa = Auth::guard('siswa')->user();
        @endphp
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-siswa-profile/$siswa->nis") }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NIS</label>
              <input type="text" name="nis" class="form-control" id="exampleInputPassword1" placeholder="" disabled="true" value="{{$siswa->nis}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" disabled="true" value="{{$siswa->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="" value="{{$siswa->alamat}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="text" name="ttl" class="form-control" id="exampleInputPassword4" required placeholder="" value="{{$siswa->ttl}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Telp</label>
              <input type="text" name="nomor" class="form-control" id="exampleInputPassword5" placeholder="" value="{{$siswa->nomor}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword6">Email</label>
              <input type="text" name="email" class="form-control" id="exampleInputPassword6" placeholder="" value="{{$siswa->email}}">
            </div>
            <button class="btn btn-success" type="submit" onclick="{{url('/siswa')}}">Simpan</button>
          </form>
        </div>
        @endif


        
    </div>
@stop