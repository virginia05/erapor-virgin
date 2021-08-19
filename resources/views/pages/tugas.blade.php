@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <div class="d-flex align-items-baseline">

           <a href="{{ url("/nilai") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
          <h5>{{$siswa->nama}}</h5>
        </div>
        <hr>

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Tugas</button>
        {{-- {{ $datas }} --}}
        
        <div class="my-4 mx-2">          
        @forelse($datas as $tugas)
            <div class="form-group row">
                <label for="staticTugas{{$tugas->id}}" class="col-sm-2 col-form-label">{{$tugas->keterangan}}</label>
                <div class="col-sm-3">

                <form class="d-flex" method="post" action="{{ url("/put/nilaiTugas/$tugas->id") }}">
                  @csrf
                  <input type="hidden" name="id_mapel" value="{{ $mapel }}">
                  <input type="hidden" name="nis" value="{{ $nis }}">
                  <input type="number" name="tugas_value" class="form-control-plaintext" id="staticTugas{{$tugas->id}}" value="{{$tugas->nilai}}" min="0" max="100">
                  <button class="btn btn-warning ml-3" type="submit">
                    Edit
                  </button>
                  <a class="btn btn-danger ml-3" href="{{ url("/delete/nilaiTugas/$tugas->id") }}" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                </form>
                </div>
            </div>
        @empty
            <p class="h5 mt-4">Belum ada tugas</p>
        @endforelse
        </div>
        
    </div>
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form method="post" action="{{ url("/post/nilaiTugas/$nis") }}" >
                  @csrf
                  <input type="hidden" name="id_mapel" value="{{ $mapel }}">
                  <input type="hidden" name="nis" value="{{ $nis }}">
                  <input type="hidden" name="semester" value="{{ $semester }}">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" required  placeholder="Keterangan tugas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nilai</label>
                    <input type="text" name="nilai" class="form-control" id="exampleInputPassword1" required placeholder="Nilai">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" data-bs-dismiss="modal" onclick="reload()" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>

        <script type="text/javascript">
          function reload(){
            location.reload();
          }
        </script>

        </div>
@stop