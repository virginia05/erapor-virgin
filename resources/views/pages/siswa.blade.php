@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        {{-- lalala --}}
      @else
        {{-- lololol --}}
      @endif
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <a class="btn btn-primary my-3" href="{{ url("/form-siswa/tambah") }}">Tambah Siswa</a>
        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">NIS</th>
                <th class="align-middle" scope="col">Aksi</th>
                <th class="align-middle" scope="col">Nama</th>
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
                <td class="d-flex">
                  <a class="btn btn-warning mr-2" href="{{ url("/form-siswa/edit?id=$data->nis") }}">Edit</a>
                  <a class="btn btn-danger" href="{{url('/hapus-siswa/' . $data->nis)}}" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                </td>
                <td class="align-middle">{{ $data->nama }}</td>
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