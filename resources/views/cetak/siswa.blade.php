<!doctype html>
<html>
<head>
    <title>E-rapor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h3 style="text-align: center;">Daftar Peserta Didik</h3>
    <h3 style="text-align: center;">SMK Yapan Indonesia</h3><hr>
          <table class="table">
              <tr class="text-center" >
                <th class="align-middle"style="width:10%;word-break: break-word;" scope="col">NISN</th>
                <th class="align-middle" scope="col">Nama</th>
                <th class="align-middle" scope="col">Jenis Kelamin</th>
                <th class="align-middle" scope="col">Nama Ibu</th>
                <th class="align-middle" scope="col">Id Kelas</th>
                <th class="align-middle" scope="col">Alamat</th>
                <th class="align-middle" scope="col">Tanggal Lahir</th>
                <th class="align-middle"style="width:8%;word-break: break-word;" scope="col">nomor</th>
                <th class="align-middle"style="width:15%;word-break: break-word;" scope="col">Email</th>
              </tr>
              @foreach ($all_siswa as $data)
              <tr class="text-center" >
                <th class="align-middle"style="width:10%;word-break: break-word;">{{ $data->nis }}</th>
                <td class="align-middle">{{ $data->nama }}</td>
                <td class="align-middle">{{ $data->gender }}</td>
                <td class="align-middle">{{ $data->nama_ibu }}</td>
                <td class="align-middle">{{ $data->id_kelas }}</td>
                <td class="align-middle">{{ $data->alamat }}</td>
                <td class="align-middle">{{ $data->ttl }}</td>
                <td class="align-middle"style="width:8%;word-break: break-word;">{{ $data->nomor }}</td>
                <td class="align-middle"style="width:15%;word-break: break-word;">{{ $data->email }}</td>
              </tr>
              @endforeach
          </table>

</body>
</html>