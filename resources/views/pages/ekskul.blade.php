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

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Ekstrakulikuler</button>
        
        <div class="my-4 mx-2">          
        @forelse($datas as $key => $ekskul)
            @php
              if($key == 0){
                $smt = 1;
              }else{
                $smt = $datas[$key - 1]->semester;
              }
            @endphp
            @if ($key == 0)
              <p><b>Semester {{$ekskul->semester}}</b></p>
            @endif
            @if ($smt != $ekskul->semester)
              <p><b>Semester {{$ekskul->semester}}</b></p>
            @endif
            <div class="form-group row">
                <label for="staticTugas{{$ekskul->id}}" class="col-sm-2 col-form-label">{{$ekskul->nama_eks}}</label>
                <div class="col-sm-3">
                <form class="d-flex" method="post" action="{{ url("/edit-ekskul/$ekskul->id") }}">
                  @csrf
                  <input type="hidden" name="nis" value="{{ $nis }}">
                  <input type="number" name="predikat" class="form-control-plaintext" id="staticTugas{{$ekskul->id}}" value="{{$ekskul->predikat}}" min="0" max="100">
                  <button class="btn btn-warning ml-3" type="submit">
                    Edit
                  </button>
                  <a class="btn btn-danger ml-3" href="{{ url("/hapus-ekskul/$ekskul->id") }}" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                </form>
                </div>
            </div>
        @empty
            <p class="h5 mt-4">Belum Ada Nilai Ekstrakulikuler</p>
        @endforelse
        </div>
        
    </div>
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ekstrakulikuler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form method="post" action="{{ url("/tambah-ekskul") }}" >
                  @csrf
                  <input type="hidden" name="nis" value="{{ $nis }}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Ekskul</label>
                    <input type="text" name="nama_eks" class="form-control" id="exampleInputEmail1" required  placeholder="Nama Ekskul">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Predikat</label>
                    <input type="text" name="predikat" class="form-control" id="exampleInputEmail1" required  placeholder="Nilai Predikat">
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