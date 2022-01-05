@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">
           <a href="{{ url("/siswa") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
        </div>
        @if ($param === 'edit') 
        <div class="my-4 mx-2">   
        <!-- FORM UBAH SISWA -->
          <form class="" method="post" action="{{ url("/edit-siswa/$siswa->nis") }}" >
          <h3>Ubah Data Siswa</h3>
          <hr>
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NIS</label>
              <input type="text" name="nis" class="form-control" id="exampleInputPassword1" placeholder="" value="{{$siswa->nis}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" value="{{$siswa->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword7">Jenis Kelamin</label>
              <p><input type="radio" name="gender" id="exampleInputPassword7" value="Laki-Laki" required placeholder="">   Laki-Laki 
              <br><input type="radio" name="gender"  id="exampleInputPassword7" value="Perempuan"  required placeholder="">   Perempuan</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword8">Nama Ibu</label>
              <input type="text" name="nama_ibu" class="form-control" id="exampleInputPassword8" required placeholder="" value="{{$siswa->nama_ibu}}">
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
            <button class="btn btn-success" type="submit" onclick="{{url('/siswa')}}">Ubah Data</button>
          </form>
        </div>
        @else 
        <div class="my-4 mx-2">    
          
        <!-- FORM TAMBAH SISWA -->
          <form class="" method="post" action="{{ url("/tambah-siswa") }}">
            @csrf
            <h3>Tambah Peserta Didik</h3>
            <hr>
            <div class="form-group">
              <label for="exampleInputPassword1">NIS</label>
              <input type="text" name="nis" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword8">Jenis Kelamin</label>
              <p><input type="radio" name="gender" id="exampleInputPassword8" value="Laki-Laki" required placeholder="">   Laki-Laki 
              <br><input type="radio" name="gender"  id="exampleInputPassword8" value="Perempuan"  required placeholder="">   Perempuan</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword10">Nama Ibu</label>
              <input type="text" name="nama_ibu" class="form-control" id="exampleInputPassword10" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="date" name="ttl" class="form-control" id="exampleInputPassword4" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Handphone</label>
              <input type="text" name="nomor" class="form-control" id="exampleInputPassword5" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword6">Email</label>
              <input type="text" name="email" class="form-control" id="exampleInputPassword6" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword11">Password</label>
              <input type="text" name="password" class="form-control" id="exampleInputPassword11" required placeholder="">
            </div>
              <button class="btn btn-success" type="submit">Simpan Data</button>
          </form>
        </div>
        @endif


        
    </div>
@stop