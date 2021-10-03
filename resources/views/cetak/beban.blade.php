<!doctype html>
<html>
<head>
    <title>E-rapor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="m-3">
        <h3 style="text-align: center;">Daftar Nama dan Beban Mengajar Guru</h3>
        <h3 style="text-align: center;"> SMK Yapan Indonesia</h3> <hr>
        <div class="table-responsive mb-3">
          <table class="table">
            <thead class="thead-dark">
              <tr class="text-center" style="white-space: nowrap;" >
                <th class="align-middle" scope="col">Id</th>
                <th class="align-middle" scope="col">Nama Guru</th>
                <th class="align-middle" scope="col">Nama Kelas</th>
                <th class="align-middle" scope="col">Mapel Yang Diajar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr class="text-center" style="white-space: nowrap;">
                <th class="align-middle" scope="row">{{ $data->id }}</th>
                <td class="align-middle">{{ $data->nama }}</td>
                <td class="align-middle">{{ $data->nama_kelas }}</td>
                <td class="align-middle">{{ $data->nama_mapel }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $datas->links('pagination::bootstrap-4') !!}
        </div> 
    </div>
</body>
</html>