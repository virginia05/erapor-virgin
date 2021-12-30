@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">

           <a href="{{ url("/beban") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
        </div>

<!-- form edit beban ajar guru -->
        @if ($param === 'edit') 
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-beban/$beban->id") }}" >
            @csrf
            <h2>Ubah Data Beban Mengajar</h2>
            <hr>
            <div class="form-group">
              <label >Pilih Guru</label>
              <select name="nuptk" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_guru as $guru)
                  <option value="{{$guru->nuptk}}">{{$guru->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Pilih Mapel</label>
              <select name="id_mapel" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_mapel as $mapel)
                   <option value="{{$mapel->id_mapel}}">{{$mapel->nama_mapel }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Pilih Kelas</label>
              <select name="id_kelas" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_kelas as $kelas)
                  @if ($kelas->id_kelas == 1)
                    @continue;
                  @else
                   <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <button class="btn btn-success" type="submit" onclick="{{url('/beban')}}">Ubah Data</button>
          </form>
        </div>
        @else 

<!-- form tambah beban ajar guru -->
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/tambah-beban") }}">
          <h2>Tambah Beban Mengajar</h2>
          <hr>
            @csrf
            <div class="form-group">
              <label >Pilih Guru</label>
              <select name="nuptk" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_guru as $guru)
                  <option value="{{$guru->nuptk}}">{{$guru->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Pilih Mapel</label>
              <select name="id_mapel" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_mapel as $mapel)
                   <option value="{{$mapel->id_mapel}}">{{$mapel->nama_mapel }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label >Pilih Kelas</label>
              <select name="id_kelas" class="form-select w-100 p-2" aria-label="Default select example">
                @foreach ($all_kelas as $kelas)
                  @if ($kelas->id_kelas == 1)
                    @continue;
                  @else
                   <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <button class="btn btn-success" type="submit">Simpan Data</button>
          </form>
        </div>
        @endif
        
    </div>
@stop