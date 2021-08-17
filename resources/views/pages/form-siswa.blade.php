@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">

           <a href="{{ url("/siswa") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
        </div>
        <hr>
        @if ($param === 'edit') 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-siswa/$siswa->nis") }}" >
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
        @else 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/tambah-siswa") }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NIS</label>
              <input type="text" name="nis" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="text" name="ttl" class="form-control" id="exampleInputPassword4" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword5">Nomor Telp</label>
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
              <button class="btn btn-success" type="submit">Simpan</button>
          </form>
        </div>
        @endif


        
    </div>
@stop