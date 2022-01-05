<style type="text/css">
    .container-nav{
    }

    .btn-li{
        padding: 10px;
        color: black;
    }
    .btn-li:hover{
        background-color: grey;
        color: white;
        text-decoration: none;
    }
</style>
<ul class="container-nav nav d-flex flex-column">
    @php
        if(Auth::user()){
            $user = Auth::user();
        }else{
            $user = Auth::guard('siswa')->user();
        }
        $id = Auth::id();

    @endphp   
    {{-- {{$user}}  --}}
    @if ($user->jenis_ptk)
        @if (str_contains(strtolower("Guru Mapel"), strtolower($user->jenis_ptk)))
            <a class="btn-li my-2" href="{{url('/nilai')}}">Kelola Nilai Siswa</a>
            <a class="btn-li my-2" href="{{url('/absensi')}}">Kehadiran Siswa</a>
        @elseif (str_contains(strtolower("Kepala Sekolah"), strtolower($user->jenis_ptk)))
            <a class="btn-li my-2" href="{{url('/ledger?tahun_ajaran=2021/2022&kode_rombel=1')}}">Ledger</a>
            <b class=" my-2">Laporan</b>
           <a class="btn-li my-2" href="{{url('/lihat-beban')}}">Beban Ajar</a>
           <a class="btn-li my-2" href="{{url('/lihat-siswa')}}">Peserta Didik</a>
           <a class="btn-li my-2" href="{{url('/lihat-guru')}}">Tenaga Pendidik</a>
        @elseif (str_contains(strtolower("Tenaga Administrasi Sekolah"), strtolower($user->jenis_ptk)))
           <a class="btn btn-primary my-3" href="{{url('/reset-tahun-ajaran')}}" onclick="return confirm('Apakah Anda Yakin Ingin Memulai Ajaran Baru?')">Mulai Tahun Ajaran Baru</a>
           <a class="btn-li my-2" href="{{url('/ledger?tahun_ajaran=2021/2022&kode_rombel=1')}}">Ledger</a>
           <b class=" my-2">Kelola Data</b>
           <a class="btn-li my-2" href="{{url('/kelas')}}">Kelas</a>
           <a class="btn-li my-2" href="{{url('/mapel')}}">Mata Pelajaran</a>
           <a class="btn-li my-2" href="{{url('/beban')}}">Beban Ajar</a>
           <a class="btn-li my-2" href="{{url('/siswa')}}">Peserta Didik</a>
           <a class="btn-li my-2" href="{{url('/guru')}}">Tenaga Pendidik</a>
       @endif
    @else
        <a class="btn-li my-2" href="{{url('/lihat-nilai?semester=1')}}">Capaian Kompetensi</a>
    @endif
    
   <a href="{{url('/profile')}}" class="btn-li my-2">Profil</a>
   <a href="{{url('/logout')}}" class="btn-li my-2">Keluar</a>
</ul>