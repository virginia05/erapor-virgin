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
                
              
                  @if ($nilai->pengetahuan >= 95 )
                    <td>A+</td>
                  @elseif ($nilai->pengetahuan >= 90 )
                    <td>A</td>
                  @elseif ($nilai->pengetahuan >= 85 )
                    <td>A-</td>
                  @elseif ($nilai->pengetahuan >= 80 )
                    <td>B+</td>
                  @elseif ($nilai->pengetahuan >= 75 )
                    <td>B</td>
                  @elseif ($nilai->pengetahuan >= 70 )
                    <td>B-</td>
                  @elseif ($nilai->pengetahuan >= 60 )
                    <td>C</td>
                  @else
                    <td>D</td>
                  @endif
                
                <td>{{$nilai->keterampilan}}</td>
                
                @if ($nilai->keterampilan >= 95 )
                    <td>A+</td>
                  @elseif ($nilai->keterampilan >= 90 )
                    <td>A</td>
                  @elseif ($nilai->keterampilan >= 85 )
                    <td>A-</td>
                  @elseif ($nilai->keterampilan >= 80 )
                    <td>B+</td>
                  @elseif ($nilai->keterampilan >= 75 )
                    <td>B</td>
                  @elseif ($nilai->keterampilan >= 70 )
                    <td>B-</td>
                  @elseif ($nilai->keterampilan >= 60 )
                    <td>C</td>
                  @else
                    <td>D</td>
                  @endif


                  @if ($nilai->sikap >= 95 )
                    <td>A+</td>
                  @elseif ($nilai->sikap >= 90 )
                    <td>A</td>
                  @elseif ($nilai->sikap >= 85 )
                    <td>A-</td>
                  @elseif ($nilai->sikap >= 80 )
                    <td>B+</td>
                  @elseif ($nilai->sikap >= 75 )
                    <td>B</td>
                  @elseif ($nilai->sikap >= 70 )
                    <td>B-</td>
                  @elseif ($nilai->sikap >= 60 )
                    <td>C</td>
                  @else
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
                @if ($elementEkskul->predikat > 92 )
                  <td class="text-center">A</td>
                @elseif ($elementEkskul->predikat > 83 )
                  <td class="text-center">B</td>
                @elseif ($elementEkskul->predikat > 74 )
                  <td class="text-center">C</td>
                @elseif ($elementEkskul->predikat >= 0 )
                  <td class="text-center">D</td>
                @endif
              </tr>
            @endforeach
            <tr class="text-center align-middle">
              <td class="text-center align-middle" rowspan="4">Kepribadian</td>
            </tr>
            <tr>
              <td>1. Kelakuan</td>
              @if ($kepribadian->nilai_kelakuan)
                @if ($kepribadian->nilai_kelakuan > 92 )
                  <td class="text-center">A</td>
                @elseif ($kepribadian->nilai_kelakuan > 83 )
                  <td class="text-center">B</td>
                @elseif ($kepribadian->nilai_kelakuan > 74 )
                  <td class="text-center">C</td>
                @elseif ($kepribadian->nilai_kelakuan >= 0 )
                  <td class="text-center">D</td>
                @endif
              @else
                <td class="text-center">E</td>
              @endif
            </tr>
            <tr>
              <td>2. Kerajinan</td>
              @if ($kepribadian->nilai_kerajinan)
                @if ($kepribadian->nilai_kerajinan > 92 )
                  <td class="text-center">A</td>
                @elseif ($kepribadian->nilai_kerajinan > 83 )
                  <td class="text-center">B</td>
                @elseif ($kepribadian->nilai_kerajinan > 74 )
                  <td class="text-center">C</td>
                @elseif ($kepribadian->nilai_kerajinan >= 0 )
                  <td class="text-center">D</td>
                @endif
              @else
                <td class="text-center">E</td>
              @endif
            </tr>
            <tr>
              <td>3. Kerapihan </td>
              @if ($kepribadian->nilai_kerapihan)
                @if ($kepribadian->nilai_kerapihan > 92 )
                  <td class="text-center">A</td>
                @elseif ($kepribadian->nilai_kerapihan > 83 )
                  <td class="text-center">B</td>
                @elseif ($kepribadian->nilai_kerapihan > 74 )
                  <td class="text-center">C</td>
                @elseif ($kepribadian->nilai_kerapihan >= 0 )
                  <td class="text-center">D</td>
                @endif
              @else
                <td class="text-center">E</td>
              @endif
            </tr>
            <tr class="text-center align-middle">
              <td class="text-center align-middle" rowspan="4">Ketidakhadiran</td>
            </tr>
            <tr>
              <td>1. Sakit</td>
              <td class="text-center">{{$absensi->sakit ? $absensi->sakit : '0'}}</td>
            </tr>
            <tr>
              <td>2. Izin</td>
              <td class="text-center">{{$absensi->izin ? $absensi->izin : '0'}}</td>
            </tr>
            <tr>
              <td>3. Tanpa Keterangan  </td>
              <td class="text-center">{{$absensi->alfa ? $absensi->alfa : '0'}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      @else
        <p><b>Nilai lain Belum tersedia</b></p>
      @endif

    </div>
@stop