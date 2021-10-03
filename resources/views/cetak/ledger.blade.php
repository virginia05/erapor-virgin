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
      font-size: 6pt;
    }
  </style>
<body>
    <h3 style="text-align: center;">Laporan Ledger Siswa/i</h3>
    <h3 style="text-align: center;">SMK Yapan Indonesia</h3><hr>
    <div class="mt-3 mb-2">
          <p>Nama Rombel : <b>{{$nama_rombel}}</b></p>
          <p>Tahun Ajaran : <b>{{$tahun_ajaran}}</b></p>
    </div>
          <table width="100%" class="table" style="table-layout:fixed;">
            <thead class="thead-dark">
              <tr class="text-center">
                <th scope="col" class="align-middle" rowspan="2">Nama Siswa</th>
                <th scope="col" class="align-middle" rowspan="2">NIS</th>
                @foreach ($mapels as $datamapel)
                  <th scope="col" colspan="3">{{$datamapel}}</th>
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
          </table> <br>
    <h6 style="text-align: right;">Kepala Sekolah</h6>
</body>
</html>