@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
      <ul class="nav nav-tabs">
        @foreach ($semesters as $key => $element)
            <li class="nav-item">
              <a class="nav-link {{  $element == $semesterPilihan? 'active' : '' }}" aria-current="page" href="{{url('/lihat-nilai?semester='.$element)}}">Semester {{$element}}</a>
            </li>
        @endforeach
      </ul>

      <a href="{{ url('/cetak_pdf?semester='.$semesterPilihan) }}" class="my-3 btn btn-primary">Cetak Rapor</a>

      <div class="mt-3">
        <p>Nama : <b>{{$identitas->nama}}</b></p>
        <p>NISN : {{$identitas->nis}}</p>
        <p>Semester : {{$semesterPilihan}}</p>
        <p>Kelas : {{$identitas->nama_kelas}}</p>
        <p>Tahun Ajaran : {{count($nilais) != 0 ? $nilais[0]->tahun_ajaran : '' }}</p>
      </div>

      <div>
        <table class="table table-striped">
          <thead class="text-center">
            <tr class="align-middle">
              <th scope="col" class="align-middle" rowspan="3">No</th>
              <th scope="col" class="align-middle" rowspan="3">Mata Pelajaran</th>
              <th scope="col" class="align-middle" rowspan="3">KKM</th>
              <th scope="col" class="align-middle" colspan="2">Pengetahuan</th>
              <th scope="col" class="align-middle" colspan="2">Keterampilan</th>
              <th scope="col" class="align-middle" colspan="2">Sikap Spritual dan Sosial</th> 
            </tr>
            <tr>
              <th scope="col">Angka</th>
              <th scope="col">Predikat</th>
              <th scope="col">Angka</th>
              <th scope="col">Predikat</th>
              <th scope="col">Dalam Pembelajaran</th> 
            </tr>
            <tr>
              <th scope="col">0 -100</th>
              <th scope="col"></th>
              <th scope="col">0 -100</th>
              <th scope="col"></th>
              <th scope="col">A/ B/ C/ D</th> 
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($nilais as $key => $nilai)
              <tr>
                <th class="align-middle" scope="row" rowspan="2">{{$key+1}}</th>
                <td>{{$nilai->nama_mapel}}</td>
                <td>{{$nilai->KKM}}</td>
                <td>{{$nilai->pengetahuan}}</td>
                
                  @if ($nilai->pengetahuan > 92 )
                    <td>A</td>
                  @elseif ($nilai->pengetahuan > 83 )
                    <td>B</td>
                  @elseif ($nilai->pengetahuan > 74 )
                    <td>C</td>
                  @elseif ($nilai->pengetahuan >= 0 )
                    <td>D</td>
                  @endif
                
                <td>{{$nilai->keterampilan}}</td>
                
                  @if ($nilai->keterampilan > 92 )
                    <td>A</td>
                  @elseif ($nilai->keterampilan > 83 )
                    <td>B</td>
                  @elseif ($nilai->keterampilan > 74 )
                    <td>C</td>
                  @elseif ($nilai->keterampilan >= 0 )
                    <td>D</td>
                  @endif
                
                  @if ($nilai->sikap > 92 )
                    <td>A</td>
                  @elseif ($nilai->sikap > 83 )
                    <td>B</td>
                  @elseif ($nilai->sikap > 74 )
                    <td>C</td>
                  @elseif ($nilai->sikap >= 0 )
                    <td>D</td>
                  @endif
              </tr>
              <tr>
                <td>Guru : {{$nilai->nama}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
      @if ($ekskul != false && $kepribadian != false && $absensi != false)
        <h4>Catatan Tengah Semester</h4>
        <div>
        <table class="table ">
          <thead class="text-center">
            <tr>
              <th scope="col" colspan="2">Komponen</th>
              <th scope="col">Predikat</th>
            </tr>
          </thead>
          <tbody>
            
            <tr >
              <td class="text-center align-middle" rowspan="{{count(is_countable($ekskul)?$ekskul:[]) + 1}}">Kegiatan Pengembangan Diri</td>
            </tr>
            @foreach ($ekskul as $key => $elementEkskul)
              <tr>
                <td>{{$key+1}} .{{$elementEkskul->nama_eks}}</td>
                <td class="text-center">{{$elementEkskul->predikat}}</td>
              </tr>
            @endforeach
            <tr class="text-center align-middle">
              <td class="text-center align-middle" rowspan="4">Kepribadian</td>
            </tr>
            <tr>
              <td>1. Kelakuan</td>
              <td class="text-center">{{$kepribadian->nilai_kelakuan ? $kepribadian->nilai_kelakuan : 'E'}}</td>
            </tr>
            <tr>
              <td>2. Kerajinan</td>
              <td class="text-center">{{$kepribadian->nilai_kerajinan ? $kepribadian->nilai_kerajinan : 'E'}}</td>
            </tr>
            <tr>
              <td>3. Kerapihan </td>
              <td class="text-center">{{$kepribadian->nilai_kerapihan ? $kepribadian->nilai_kerapihan : 'E'}}</td>
            </tr>
            <tr class="text-center align-middle">
              <td class="text-center align-middle" rowspan="4">Ketidakhadiran</td>
            </tr>
            <tr>
              <td>1. Sakit</td>
              <td class="text-center">{{$absensi->sakit ? $absensi->sakit : 'E'}}</td>
            </tr>
            <tr>
              <td>2. Izin</td>
              <td class="text-center">{{$absensi->izin ? $absensi->izin : 'E'}}</td>
            </tr>
            <tr>
              <td>3. Tanpa Keterangan  </td>
              <td class="text-center">{{$absensi->alfa ? $absensi->alfa : 'E'}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      @else
        <p><b>Nilai lain Belum tersedia</b></p>
      @endif

    </div>
@stop