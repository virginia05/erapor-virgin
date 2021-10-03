@extends('layouts.layout')
@section('content')

    <div class="m-3">
      <iframe id="invisible" name="invisible" style="display:none;"></iframe>

<!-- daftar tambah siswa kedalam kelas -->
      <h2>Daftar Kelas</h2>
        <div class="d-flex align-items-center my-3">
          <div class="dropdown mx-3">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Kelas
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              @foreach ($all_kelas as $itemDropdownKelas)
                @if ($itemDropdownKelas->id_kelas != 1) 
                    <li><a class="dropdown-item" href="{{url('/kelas?id='.$itemDropdownKelas->id_kelas)}}">{{$itemDropdownKelas->nama_kelas}}</a></li>
                @endif
              @endforeach
            </ul>
          </div>
          <div class="dropdown ">
              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Pilih Siswa
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($siswas as $siswa)
                  <li><a class="dropdown-item" href="{{url('/kelas-kelola-siswa/'.$siswa->nis . '/' .$id_kelas)}}">{{$siswa->nama}}</a></li>
                @endforeach
              </ul>
            </div>
          {{-- <a class="btn btn-success my-3 text-white" href="{{ url('/kelas-kelola-siswa/'. $id_kelas) }}">Tambah Siswa</a> --}}
        </div>

        <table class="table">
          <thead class="thead-dark">
            <tr class="text-center">
              <th scope="col">nama_kelas</th>
              <th scope="col">nama</th>
              <th scope="col">nis</th>
              {{-- <th scope="col">Aksi</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($pilihanKelas as $itemKelas)
            <tr class="text-center">
              <th scope="row">{{ $itemKelas->nama_kelas }}</th>
              <td>{{ $itemKelas->nama }}</td>
              <td>{{ $itemKelas->nis }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $pilihanKelas->links('pagination::bootstrap-4') !!}
        </div>
        
<!--Daftar Walikelas  -->
      <hr>
      <h2>Daftar Walikelas</h2>
        <button class="btn btn-success my-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Kelas</button>
        <table class="table">
          <thead class="thead-dark">
            <tr class="text-center">
              <th scope="col">Id</th>
              <th scope="col">Rombel</th>
              <th scope="col">Walikelas</th>
              <th scope="col">kelas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kelas as $dataKelas)
                @if ($dataKelas->id_kelas == 1) 
                   @continue
                @endif
            <tr class="text-center">
              <th scope="row">{{ $dataKelas->id_kelas }}</th>
              <td>{{ $dataKelas->nama_rombel }} {{$dataKelas->jurusan}}</td>
              <td>
              <form class="d-flex" method="post" action="{{ url("/ganti-walikelas") }}" target="invisible" >
                  @csrf
                <input type="hidden" name="id_kelas" value="{{ $dataKelas->id_kelas }}">
                <select name="kode_guru" class="form-select w-100 p-2" value="{{$dataKelas->kode_guru}}" aria-label="Default select example">
                  @foreach ($all_guru as $guru)
                   @if ($guru->kode_guru == $dataKelas->kode_guru)
                      <option selected value="{{$guru->kode_guru}}">{{$guru->nama}}</option>
                    @else
                      <option value="{{$guru->kode_guru}}">{{$guru->nama}}</option>
                    @endif
                  @endforeach
                </select>
              </td>
              <td>{{ $dataKelas->nama_kelas }}</td>
              <td>
              	<button class="btn btn-success" type="submit">Ganti Walikelas</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $kelas->links('pagination::bootstrap-4') !!}
        </div>

         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ url("/post/kelas") }}" target="invisible">
                  @csrf
                  <div class="form-group">
                    <label >Pilih Rombel</label>
                    <select name="kode_rombel" class="form-select w-100 p-2" aria-label="Default select example">
                      @foreach ($all_rombel as $rombel)
                        <option value="{{$rombel->kode_rombel}}">{{$rombel->nama_rombel . " " .$rombel->jurusan }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Pilih Walikelas</label>
                    <select name="kode_guru" class="form-select w-100 p-2" aria-label="Default select example">
                      @foreach ($all_guru as $guru)
                        <option value="{{$guru->kode_guru}}">{{$guru->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" id="exampleInputPassword1" required placeholder="cth : 10 MM 1">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" data-bs-dismiss="modal" onclick="reload()" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        <script type="text/javascript">
          function reload(){
            location.reload();
          }
        </script>
       
    </div>
@stop