@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        {{-- lalala --}}
      @else
        {{-- lololol --}}
      @endif
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="dropdown ">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Rombel
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($all_rombel as $rombel)
                  <li><a class="dropdown-item" href="{{url('/beban?kode_rombel='.$rombel->kode_rombel)}}">{{$rombel->nama_rombel}} {{$rombel->jurusan}}</a></li>
                @endforeach
              </ul>
            </div>
        </div>
        <a class="btn btn-primary my-3" href="{{ url("/form-beban/tambah") }}">Tambah Beban Ajar</a>
        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">Id</th>
                <th class="align-middle" scope="col">Nama Guru</th>
                <th class="align-middle" scope="col">Nama Kelas</th>
                <th class="align-middle" scope="col">Mapel Yang Diajar</th>
                <th class="align-middle" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr class="text-center" style="white-space: nowrap;">
                <th class="align-middle" scope="row">{{ $data->id }}</th>
                <td class="align-middle">{{ $data->nama }}</td>
                <td class="align-middle">{{ $data->nama_kelas }}</td>
                <td class="align-middle">{{ $data->nama_mapel }}</td>
                <td class="d-flex justify-content-center">
                  <a class="btn btn-warning mr-2" href="{{ url("/form-beban/edit?id=$data->id") }}">Edit</a>
                  <a class="btn btn-danger" href="{{url('/hapus-beban/' . $data->id)}}" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $datas->links('pagination::bootstrap-4') !!}
        </div>

      
        
     
    </div>
@stop