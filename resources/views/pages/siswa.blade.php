@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        {{-- lalala --}}
      @else
        {{-- lololol --}}
      @endif
      <h2>Data Peserta Didik</h2>
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <a class="btn btn-success my-3" href="{{ url("/form-siswa/tambah") }}">Tambah Data</a>
        <a href="{{ url('/cetak_pdf_siswa') }}" class="my-3 btn btn-primary">Cetak Data</a>
        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">NISN</th>
                <th class="align-middle" scope="col">Nama Siswa</th>
                <th class="align-middle" scope="col">Jenis Kelamin</th>
                <th class="align-middle" scope="col">Nama Ibu</th>
                <th class="align-middle" scope="col">ID Kelas</th>
                <th class="align-middle" scope="col">Alamat</th>
                <th class="align-middle" scope="col">Tanggal Lahir</th>
                <th class="align-middle" scope="col">Nomor Tlp</th>
                <th class="align-middle" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_siswa as $data)
              <tr class="text-center" style="white-space: nowrap;">
                <th class="align-middle">{{ $data->nis }}</th>
                <td class="align-middle">{{ $data->nama }}</td>
                <td class="align-middle">{{ $data->gender }}</td>
                <td class="align-middle">{{ $data->nama_ibu }}</td>
                <td class="align-middle">{{ $data->id_kelas }}</td>
                <td class="align-middle">{{ $data->alamat }}</td>
                <td class="align-middle">{{ $data->ttl }}</td>
                <td class="align-middle">{{ $data->nomor }}</td>
                <td class="d-flex">
                  <a class="btn btn-warning mr-2" href="{{ url("/form-siswa/edit?id=$data->nis") }}">Ubah</a>
                  <a class="btn btn-danger" href="{{url('/hapus-siswa/' . $data->nis)}}" onclick="return confirm('Hapus Data Siswa?')">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $all_siswa->links('pagination::bootstrap-4') !!}
        </div>
  
    </div>
@stop