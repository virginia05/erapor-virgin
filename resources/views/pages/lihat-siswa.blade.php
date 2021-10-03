@extends('layouts.layout')
@section('content')

    <div class="m-3">
      <h2>Data Peserta Didik</h2>
        <a href="{{ url('/cetak_pdf_siswa') }}" class="my-3 btn btn-primary">Cetak PDF</a>

        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">NIS</th>
                <th class="align-middle" scope="col">Nama</th>
                <th class="align-middle" scope="col">Gender</th>
                <th class="align-middle" scope="col">Nama Ibu</th>
                <th class="align-middle" scope="col">Id Kelas</th>
                <th class="align-middle" scope="col">Alamat</th>
                <th class="align-middle" scope="col">Tanggal Lahir</th>
                <th class="align-middle" scope="col">nomor</th>
                <th class="align-middle" scope="col">Email</th>
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
                <td class="align-middle">{{ $data->email }}</td>
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