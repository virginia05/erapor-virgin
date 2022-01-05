@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline"></div>
        <h2>Kelola Profil</h2><hr>
        @if (Auth::check()) 
        @php
          $guru = Auth::user();
        @endphp
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-guru-profile/$guru->nuptk") }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NUPTK</label>
              <input type="text" name="nuptk" class="form-control" id="exampleInputPassword1" placeholder="" disabled="true" value="{{$guru->nuptk}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" disabled="true" value="{{$guru->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword7">Jenis Kelamin</label>
              <p><input {{ ($guru->gender == "Laki-Laki") ? "checked" : "" }} type="radio" name="gender" id="exampleInputPassword7" value="Laki-Laki" required placeholder="">   Laki-Laki 
              <br><input {{ $guru->gender == 'Perempuan' ? 'checked' : '' }} type="radio" name="gender"  id="exampleInputPassword7" value="Perempuan"  required placeholder="">   Perempuan</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="" value="{{$guru->alamat}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" id="exampleInputPassword4" required placeholder="" value="{{$guru->tgl_lahir}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Handphone</label>
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
            <div class="form-group">
              <label for="exampleInputPassword6">Ubah Password</label>
              <input type="text" name="password" class="form-control" id="exampleInputPassword6" placeholder="" value="">
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
              <label for="exampleInputPassword1">NISN</label>
              <input type="text" name="nis" class="form-control" id="exampleInputPassword1" placeholder="" disabled="true" value="{{$siswa->nis}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" disabled="true" value="{{$siswa->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword7">Jenis Kelamin</label>
              <p><input {{ ($siswa->gender == "Laki-Laki") ? "checked" : "" }} type="radio" name="gender" id="exampleInputPassword7" value="Laki-Laki" required placeholder="">   Laki-Laki 
              <br><input {{ $siswa->gender == 'Perempuan' ? 'checked' : '' }} type="radio" name="gender"  id="exampleInputPassword7" value="Perempuan"  required placeholder="">   Perempuan</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword8">Nama Ibu</label>
              <input type="text" name="nama_ibu" class="form-control" id="exampleInputPassword8" placeholder="" value="{{$siswa->nama_ibu}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="" value="{{$siswa->alamat}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="date" name="ttl" class="form-control" id="exampleInputPassword4" required placeholder="" value="{{$siswa->ttl}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Handphone</label>
              <input type="text" name="nomor" class="form-control" id="exampleInputPassword5" placeholder="" value="{{$siswa->nomor}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword6">Email</label>
              <input type="text" name="email" class="form-control" id="exampleInputPassword6" placeholder="" value="{{$siswa->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword6">Ubah Password</label>
              <input type="text" name="password" class="form-control" id="exampleInputPassword6" placeholder="" value="">
            </div>
            <button class="btn btn-success" type="submit" onclick="{{url('/siswa')}}">Simpan</button>
          </form>
        </div>
        @endif


        
    </div>
@stop