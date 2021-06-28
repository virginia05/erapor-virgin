@extends('layouts.layout')
@section('content')

    <div class="m-3">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="row my-3">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Rombel
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">10 MM</a></li>
              <li><a class="dropdown-item" href="#">10 AP</a></li>
              <li><a class="dropdown-item" href="#">10 PM</a></li>
            </ul>
          </div>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr class="text-center">
              <th scope="col">Nis</th>
              <th scope="col">Nama</th>
              <th scope="col">Kelas</th>
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
              <td>{{ $dataSiswa->kode_kelas }}</td>
              <td>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Input Tugas</button>
              </td>
              <td>
                <form class="d-flex" method="post" action="/put/nilaiUtsUas/{{$dataSiswa->id_nilai}}" target="invisible" >
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

<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        
    </div>
@stop