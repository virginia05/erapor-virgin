<!doctype html>
<html>
<head>
  <title>E-rapor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style type="text/css">
    table tr td,
    table tr th{
      font-size: 9pt;
    }
    
  </style>
<body>
    <h3 style="text-align: center;">Daftar Pendidik dan Tenaga Pendidikan</h3>
    <h3 style="text-align: center;">SMK Yapan Indonesia</h3><hr>
          <table class="table table-bordered" style="table-layout:fixed;">
              <tr class="text-center"  >
                <th class="align-middle" style="width:5%;" scope="col">Kode Guru</th>
                <th class="align-middle" style="width:15%;word-break: break-word;"scope="col">NUPTK</th>
                <th class="align-middle" scope="col">Nama</th>
                <th class="align-middle" scope="col">Gender</th>
                <th class="align-middle" scope="col">Alamat</th>
                <th class="align-middle" scope="col">Tanggal Lahir</th>
                <th class="align-middle" scope="col">Nomor</th>
                <th class="align-middle" scope="col">Email</th>
                <th class="align-middle" scope="col">Status Pegawai</th>
                <th class="align-middle" scope="col">Jenis PTK</th>
                <th class="align-middle" scope="col">Gelar</th>
                <th class="align-middle" scope="col">Sertifikasi</th>
              </tr>
              @foreach ($all_guru as $data)
              <tr class="text-center">
                <th class="align-middle" style="width:5%;" scope="row">{{ $data->nuptk }}</th>
                <td class="align-middle" style="width:15%;word-break: break-word;">{{ $data->nuptk }}</td>
                <td class="align-middle">{{ $data->nama }}</td>
                <td class="align-middle">{{ $data->gender }}</td>
                <td class="align-middle">{{ $data->alamat }}</td>
                <td class="align-middle">{{ $data->tgl_lahir }}</td>
                <td class="align-middle">{{ $data->nomor }}</td>
                <td class="align-middle" style="width:15%;word-break: break-word;">{{ $data->email }}</td>
                <td class="align-middle">{{ $data->status_pegawai }}</td>
                <td class="align-middle">{{ $data->jenis_ptk }}</td>
                <td class="align-middle">{{ $data->gelar }}</td>
                <td class="align-middle">{{ $data->sertifikasi }}</td>
              </tr>
              @endforeach
          </table>

</body>
</html>