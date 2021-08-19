@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        @php
          $id = Auth::id();
          $user = Auth::user();
        @endphp
      @endif
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="row my-3">
          <div class="dropdown mx-3">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Kelas & Mata Pelajaran
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              @foreach ($mapelYangDiajar as $mapel)
                <li><a class="dropdown-item" href="{{url('/nilai?id_mapel='.$mapel->id_mapel)}}">{{$mapel->nama_mapel}}</a></li>
              @endforeach
              <div class="dropdown-divider"></div>
              @foreach ($kelasYangDiajar as $kelas)
                <li><a class="dropdown-item" href="{{url('/nilai?id_kelas='.$kelas->id_kelas)}}">{{$kelas->nama_kelas}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center">
                <th scope="col">Nis</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Tugas</th>
                <th scope="col">UTS</th>
                <th scope="col">UAS</th>
                <th scope="col">Keterampilan</th>
                <th scope="col">Sikap</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $dataSiswa)
              <tr class="text-center">
                <th scope="row">{{ $dataSiswa->nis }}</th>
                <td>{{ $dataSiswa->nama }}</td>
                <td>{{ $dataSiswa->nama_kelas }}</td>
                <td>{{ $dataSiswa->nama_mapel }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ url("/nilai/tugas/$dataSiswa->nis/$dataSiswa->id_mapel/$dataSiswa->semester") }}" >Input Tugas</a>
                </td>
                <td>
                  <form class="d-flex" method="post" action="{{ url("/put/nilaiUtsUas/$dataSiswa->id_nilai") }}" target="invisible" >
                    @csrf
                  <input style="width:75px" type="number" name="uts_value" class="form-control mr-3" value="{{$dataSiswa->UTS}}" placeholder="0" min="0" max="100">
                </td>
                <td>
                  <input style="width:75px" type="number" name="uas_value" class="form-control mr-3" value="{{$dataSiswa->UAS}}"  placeholder="0" min="0" max="100">
                </td>
                <td>
                  <input  type="number" name="keterampilan" class="form-control mr-3" value="{{$dataSiswa->keterampilan}}"  placeholder="0" min="0" max="100">
                </td>
                <td>
                  <input style="width:75px" type="number" name="sikap" class="form-control mr-3" value="{{$dataSiswa->sikap}}"  placeholder="0" min="0" max="100">
                </td>
                <td>
                  <button class="btn btn-success" type="submit">Simpan</button>
                  </form>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $datas->links('pagination::bootstrap-4') !!}
        </div>

        @if ($isWalikelas)
          <hr>
          {{-- {{$kelasDiwalikan}} --}}
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center">
                <th scope="col">Nis</th>
                <th scope="col">Nama</th>
                <th scope="col">Kepribadian</th>
                <th scope="col">Ekskul</th>
                <th scope="col">Catatan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kelasDiwalikan as $dataSiswa)
              <tr class="text-center">
                <th scope="row">{{ $dataSiswa->nis }}</th>
                <td>{{ $dataSiswa->nama }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ url("/form-kepribadian/".$dataSiswa->nis) }}" >Input Kepribadian</a>
                </td>
                <td>
                  <a class="btn btn-primary" href="{{ url("/form-ekskul/".$dataSiswa->nis) }}" >Input Ekskul</a>
                </td>
                <td>
                  <a class="btn btn-primary" href="{{ url("/form-catatan/".$dataSiswa->nis) }}" >Input Catatan</a>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
              {!! $datas->links('pagination::bootstrap-4') !!}
          </div>
        @endif
       
    </div>
@stop