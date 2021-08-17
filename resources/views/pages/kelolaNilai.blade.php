@extends('layouts.layout')
@section('content')

    <div class="m-3">
      @if (Auth::check())
        {{-- lalala --}}
      @else
        {{-- lololol --}}
      @endif
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="row my-3">
          <div class="dropdown mx-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Rombel & Mata Pelajaran
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              @foreach ($mapels as $mapel)
              <li><a class="dropdown-item" href="#">{{$mapel->nama_kelas}}</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="#">{{$mapel->nama_mapel}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
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
                <a class="btn btn-primary" href="{{ url("/menu-guru/tugas/$dataSiswa->nis/$dataSiswa->id_mapel/$dataSiswa->semester") }}" >Input Tugas</a>
              </td>
              <td>
                <form class="d-flex" method="post" action="{{ url("/put/nilaiUtsUas/$dataSiswa->id_nilai") }}" target="invisible" >
                  @csrf
                <input type="number" name="uts_value" class="form-control mr-3" value="{{$dataSiswa->UTS}}" placeholder="0" min="0" max="100">
              </td>
              <td>
                <input type="number" name="uas_value" class="form-control mr-3" value="{{$dataSiswa->UAS}}"  placeholder="0" min="0" max="100">
              </td>
              <td>
                <button class="btn btn-success" type="submit">Simpan</button>
                </form>
              </td>
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
            <div class="d-flex justify-content-center">
                {!! $datas->links('pagination::bootstrap-4') !!}
            </div>
        <script type="text/javascript">
          function simpanUTS(e,nis,id){
            // e.preventDefault()
            // console.log(e)
            // console.log("nis",nis)
            // console.log("id_nilai",id)
            let data = {
              nis,id,value : 80
            }
            let url = `http://127.0.0.1:8000/api/put/siswa/${nis}/${id}`;

            // fetch(url, {
            //   method: 'PUT', 
            //   mode: 'cors', // no-cors, *cors, same-origin
            //   cache: 'no-cache', 
            //   credentials: 'same-origin',
            //   headers: {
            //     'Content-Type': 'application/json'
            //   },
            //   body: JSON.stringify(data)
            // })
             // .then(console.log)
             // .catch(console.log);
          }
        </script>
    </div>
@stop