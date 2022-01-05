@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        {{-- lalala --}}
      @else
        {{-- lololol --}}
      @endif
      <h2>Data Tenaga Pendidik</h2>
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <a class="btn btn-success my-3" href="{{ url("/form-guru/tambah") }}">Tambah Data</a>
        <a href="{{ url('/cetak_pdf_guru') }}" class="my-3 btn btn-primary">Cetak Data</a>
        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">NUPTK</th>
                <th class="align-middle" scope="col">Nama</th>
                <th class="align-middle" scope="col">Jenis Kelamin</th>
                <th class="align-middle" scope="col">Alamat</th>
                <th class="align-middle" scope="col">Tanggal Lahir</th>
                <th class="align-middle" scope="col">Nomor Tlp</th>
                <th class="align-middle" scope="col">Email</th>
                <th class="align-middle" scope="col">Status Pegawai</th>
                <th class="align-middle" scope="col">Jenis PTK</th>
                <th class="align-middle" scope="col">Gelar</th>
                <th class="align-middle" scope="col">Sertifikasi</th>
                <th class="align-middle" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_guru as $data)
              <tr class="text-center" style="white-space: nowrap;">
                <th class="align-middle" scope="row">{{ $data->nuptk }}</th>
                <td class="align-middle">{{ $data->nama }}</td>
                <td class="align-middle">{{ $data->gender }}</td>
                <td class="align-middle">{{ $data->alamat }}</td>
                <td class="align-middle">{{ $data->tgl_lahir }}</td>
                <td class="align-middle">{{ $data->nomor }}</td>
                <td class="align-middle">{{ $data->email }}</td>
                <td class="align-middle">{{ $data->status_pegawai }}</td>
                <td class="align-middle">{{ $data->jenis_ptk }}</td>
                <td class="align-middle">{{ $data->gelar }}</td>
                <td class="align-middle">{{ $data->sertifikasi }}</td>
                <td class="d-flex">
                  <a class="btn btn-warning mr-2" href="{{ url("/form-guru/edit?id=$data->nuptk") }}">Ubah</a>
                  <a class="btn btn-danger" href="{{url('/hapus-guru/' . $data->nuptk)}}" onclick="return confirm('Hapus Data Pendidik?')">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $all_guru->links('pagination::bootstrap-4') !!}
        </div>

  
       
    </div>
@stop