@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <h2>Ledger</h2><hr>
        <div class="d-flex align-items-center my-3">
          <div class="dropdown mx-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Tahun Ajaran
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{url('/ledger?tahun_ajaran=2018/2019&kode_rombel='.$kode_rombel)}}">2018/2019</a></li>
                 <li><a class="dropdown-item" href="{{url('/ledger?tahun_ajaran=2019/2020&kode_rombel='.$kode_rombel)}}">2019/2020</a></li>
                 <li><a class="dropdown-item" href="{{url('/ledger?tahun_ajaran=2020/2021&kode_rombel='.$kode_rombel)}}">2020/2021</a></li>
                 <li><a class="dropdown-item" href="{{url('/ledger?tahun_ajaran=2021/2022&kode_rombel='.$kode_rombel)}}">2021/2022</a></li>
            </ul>
          </div>
          <div class="dropdown ">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Rombel
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($rombels as $rombel)
                  <li><a class="dropdown-item" href="{{url('/ledger?tahun_ajaran='.$tahun_ajaran.'&kode_rombel='.$rombel->kode_rombel)}}">{{$rombel->nama_rombel}} {{$rombel->jurusan}}</a></li>
                @endforeach
              </ul>
            </div>
            <a href="{{url('/cetak-ledger?tahun_ajaran='.$tahun_ajaran.'&kode_rombel='.$kode_rombel)}}" class="btn btn-primary ml-2">Cetak Ledger</a>
        </div>
        <div class="mt-3 mb-2">
          <p>Nama Rombel : <b>{{$nama_rombel}}</b></p>
          <p>Tahun Ajaran : <b>{{$tahun_ajaran}}</b></p>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center">
                 <th scope="col" class="align-middle" rowspan="2">NISN</th>
                 <th scope="col" class="align-middle" rowspan="2">Nama Siswa</th>
               
                @foreach ($mapels as $datamapel)
                  <th class="text-nowrap" scope="col" colspan="3">{{$datamapel}}</th>
                @endforeach
              </tr>
              <tr class="text-center">
                @foreach ($mapels as $datamapel)
                  <th scope="col">P</th>
                  <th scope="col">K</th>
                  <th scope="col">S</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $element)
                <tr class="text-center">
                  <th scope="row">{{ $element->nama }}</th>
                  <td>{{ $element->nis }}</td>
                    <?php $nama_mapel = explode(",",$element->nama_mapel) ?>
                    <?php $nilaiP = explode(",",$element->P) ?>
                    <?php $nilaiK = explode(",",$element->K) ?>
                    <?php $nilaiS = explode(",",$element->S) ?>

                    @for ($i = 0; $i < count($mapels) ; $i++)
                      @if(in_array($mapels[$i],$nama_mapel))
                        <td>{{ $nilaiP[array_search($mapels[$i],$nama_mapel)] }}</td>
                        <td>{{ $nilaiK[array_search($mapels[$i],$nama_mapel)] }}</td>
                        <td>{{ $nilaiS[array_search($mapels[$i],$nama_mapel)] }}</td>
                      @else
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      @endif
                    @endfor
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop