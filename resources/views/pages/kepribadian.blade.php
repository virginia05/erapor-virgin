@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <div class="d-flex align-items-baseline">

           <a href="{{ url("/nilai") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
          {{-- <h5>{{$siswa->nama}}</h5> --}}
        </div>
        <hr>

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Nilai Kepribadian</button>
        
        <div class="my-4 mx-2">          
        @forelse($datas as $nilai)
            <p><b>Semester {{$nilai->semester}} / Tahun {{$nilai->tahun_ajaran}}</b></p>
            <div class="">
                {{-- <div class=""> --}}
                  <form class="d-flex" method="post" action="{{ url("/edit-kepribadian/$nilai->id") }}">
                    @csrf
                    {{-- <input type="hidden" name="semester" value="{{ $nilai->semester }}"> --}}
                    <input type="hidden" name="nis" value="{{ $nis }}">
                    <div class="form-group mr-3" style="white-space: nowrap;">
                        <label for="nilai_kerapihan{{$nilai->id}}" class="font-weight-bold col-form-label">Nilai Kerapihan</label>
                        <input type="number" name="nilai_kerapihan" class="col-sm-8 form-control-plaintext" id="nilai_kerapihan{{$nilai->id}}" value="{{$nilai->nilai_kerapihan}}" min="0" max="100">
                    </div>
                    <div class="form-group mr-3">
                        <label for="nilai_kerajinan{{$nilai->id}}" class="font-weight-bold col-form-label">Nilai Kerajinan</label>
                        <input type="number" name="nilai_kerajinan" class="form-control-plaintext" id="nilai_kerajinan{{$nilai->id}}" value="{{$nilai->nilai_kerajinan}}" min="0" max="100">
                    </div>
                    <div class="form-group mr-3">
                        <label for="nilai_kelakuan{{$nilai->id}}" class="font-weight-bold col-form-label">Nilai Kelakuan</label>
                        <input type="number" name="nilai_kelakuan" class="form-control-plaintext" id="nilai_kelakuan{{$nilai->id}}" value="{{$nilai->nilai_kelakuan}}" min="0" max="100">
                    </div>
                    <button class="btn btn-warning ml-3" type="submit">
                      Simpan Perubahan
                    </button>
                  </form>
                {{-- </div> --}}
            </div>
        @empty
            <p class="h5 mt-4">Belum Ada Nilai</p>
        @endforelse
        </div>
        
    </div>
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form method="post" action="{{ url("/tambah-kepribadian") }}" >
                  @csrf
                  <input type="hidden" name="nis" value="{{ $nis }}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai Keterampilan</label>
                    <input type="text" name="nilai_kerapihan" class="form-control" id="exampleInputEmail1" required  placeholder="Nilai Keterampilan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai Kepribadian</label>
                    <input type="text" name="nilai_kerajinan" class="form-control" id="exampleInputEmail1" required  placeholder="Nilai Kepribadian">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nilai Kelakuan</label>
                    <input type="text" name="nilai_kelakuan" class="form-control" id="exampleInputPassword1" required placeholder="Nilai Kelakuan">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" data-bs-dismiss="modal" onclick="reload()" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>

        </div>
@stop