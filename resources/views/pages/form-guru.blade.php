@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">
           <a href="{{ url("/guru") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
        </div>

        <!-- FORM EDIT GURU -->
        @if ($param === 'edit') 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-guru/$guru->kode_guru") }}" >
          <h3>Ubah Data Tenaga Pendidik</h3> <hr>
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NUPTK</label>
              <input type="text" name="nuptk" class="form-control" id="exampleInputPassword1" placeholder="" value="{{$guru->nuptk}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="" value="{{$guru->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword10">Gender</label>
              <p><input type="radio" name="gender" id="exampleInputPassword10" value="Laki-Laki" required placeholder="">   Laki-Laki 
              <br><input type="radio" name="gender"  id="exampleInputPassword10" value="Perempuan"  required placeholder="">   Perempuan</p>
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
              <label >Status Kepegawaian</label>
              <select name="status_pegawai" class="form-select w-100 p-2" aria-label="Default select example">
                  <option value="GTY/PTY">GTY/PTY</option>
                  <option value="Guru Honorer Sekolah">Guru Honor Sekolah</option>
                  <option value="Tenaga Honor Sekolah">Tenaga Honor Sekolah</option>
              </select>
            </div>
            <div class="form-group">
              <label >Jenis PTK</label>
              <select name="jenis_ptk" class="form-select w-100 p-2" aria-label="Default select example">
                  <option value="Guru Mapel">Guru Mapel</option>
                  <option value="Kepala Sekolah">Kepala Sekolah</option>
                  <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword9">Gelar</label>
              <input type="text" name="gelar" class="form-control" id="exampleInputPassword9"  placeholder="" value="{{$guru->gelar}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword10">Sertifikasi</label>
              <input type="text" name="sertifikasi" class="form-control" id="exampleInputPassword10"  placeholder="" value="{{$guru->sertifikasi}}">
            </div>
              <button class="btn btn-success" type="submit" onclick="{{url('/guru')}}">Ubah Data</button>
          </form>
        </div>
        @else 

        <!-- FORM TAMBAH GURU  -->
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/tambah-guru") }}">
          <h3>Tambah Data Tenaga Pendidik</h3> <hr>
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">NUPTK</label>
              <input type="text" name="nuptk" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword2" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword12">Gender</label>
              <p><input type="radio" name="gender" id="exampleInputPassword12" value="Laki-Laki" required placeholder="">   Laki-Laki 
              <br><input type="radio" name="gender"  id="exampleInputPassword12" value="Perempuan"  required placeholder="">   Perempuan</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword3">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword3" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" id="exampleInputPassword4" required placeholder="">
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
              <label >Status Kepegawaian</label>
              <select name="status_pegawai" class="form-select w-100 p-2" aria-label="Default select example">
                  <option value="GTY/PTY">GTY/PTY</option>
                  <option value="Guru Honorer Sekolah">Guru Honor Sekolah</option>
                  <option value="Tenaga Honor Sekolah">Tenaga Honor Sekolah</option>
              </select>
            </div>
            <div class="form-group">
              <label >Jenis PTK</label>
              <select name="jenis_ptk" class="form-select w-100 p-2" aria-label="Default select example">
                  <option value="Guru Mapel">Guru Mapel</option>
                  <option value="Kepala Sekolah">Kepala Sekolah</option>
                  <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
              </select>
            </div>
            {{-- <div class="form-group">
              <label for="exampleInputPassword8">Jenis PTK</label>
              <input type="text" name="jenis_ptk" class="form-control" id="exampleInputPassword8" required placeholder="">
            </div> --}}
            <div class="form-group">
              <label for="exampleInputPassword9">Gelar</label>
              <input type="text" name="gelar" class="form-control" id="exampleInputPassword9"  placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword10">Sertifikasi</label>
              <input type="text" name="sertifikasi" class="form-control" id="exampleInputPassword10"  placeholder="">
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