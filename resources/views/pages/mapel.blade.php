@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        {{-- lalala --}}
      @else
        {{-- lololol --}}
      @endif
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <a class="btn btn-primary my-3" href="{{ url("/form-mapel/tambah") }}">Tambah Mapel</a>
        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">Id</th>
                <th class="align-middle" scope="col">Nama</th>
                <th class="align-middle" scope="col">KKM</th>
                <th class="align-middle" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr class="text-center" style="white-space: nowrap;">
                <th class="align-middle" scope="row">{{ $data->id_mapel }}</th>
                <td class="align-middle">{{ $data->nama_mapel }}</td>
                <td class="align-middle">{{ $data->KKM }}</td>
                <td class="d-flex justify-content-center">
                  <a class="btn btn-warning mr-2" href="{{ url("/form-mapel/edit?id=$data->id_mapel") }}">Edit</a>
                  <a class="btn btn-danger" href="{{url('/hapus-mapel/' . $data->id_mapel)}}" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $datas->links('pagination::bootstrap-4') !!}
        </div>

        <hr>

        <h4>Mapel Tiap Rombel</h4>
        <div class="row justify-content-around">
          @for ($i = 0; $i < count($all_rombel) ; $i++)
            @php
              $kategori = json_decode($all_rombel[$i]->kategori_mapel,true);
            @endphp
            <div class="card mx-1 my-2 col-lg-3">
              <div class="card-header">
                {{$all_rombel[$i]->nama_rombel}} {{$all_rombel[$i]->jurusan}}
              </div>
              <div class="card-body">
                @if ($kategori == null)
                  <h5>Belum Ada Mapel</h5>
                @else
                  <ul>
                    @foreach ($kategori as $element)
                      <li>{{$element}}</li>
                    @endforeach
                  </ul>
                @endif
                <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Tambah Mapel
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="height: 200px;overflow: auto;">
                    @php
                      if($kategori == null){
                        $hasilFilter = $mapels;
                      }else{
                        $hasilFilter = array_diff($mapels,$kategori);
                      }
                    @endphp
                    @foreach ($hasilFilter as $mapel)
                      <li><a class="dropdown-item" href="{{url('/tambah-kategori/'.$mapel.'/'.$all_rombel[$i]->kode_rombel)}}">{{$mapel}}</a></li>
                    @endforeach
                  </ul>
                </div>
                <div class="dropdown mt-3">
                  <button class="btn btn-danger dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Hapus Mapel
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="height: 200px;overflow: auto;">
                    @php
                      if($kategori == null){
                        $kategori = array();
                      }
                    @endphp
                    @foreach ($kategori as $mapel)
                      <li><a class="dropdown-item" href="{{url('/hapus-kategori/'.$mapel.'/'.$all_rombel[$i]->kode_rombel)}}">{{$mapel}}</a></li>
                    @endforeach
                  </ul>
                </div> 
              </div>
            </div>
            
          @endfor
        </div>
        
     
    </div>
@stop