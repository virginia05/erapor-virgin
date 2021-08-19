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
        @if ($user->jenis_ptk == "Guru Mapel")
            <a class="btn-li my-2" href="{{url('/nilai')}}">Kelola Nilai Siswa</a>
            <a class="btn-li my-2" href="{{url('/absensi')}}">Kelola Absensi</a>
        @elseif ($user->jenis_ptk == "Kepala Sekolah")
            <a class="btn-li my-2" href="{{url('/ledger?tahun_ajaran=2021/2022&kode_rombel=1')}}">Lihat Ledger</a>
            <b class=" my-2">Lihat Data</b>
           <a class="btn-li my-2" href="{{url('/lihat-beban')}}">Beban Ajar</a>
           <a class="btn-li my-2" href="{{url('/lihat-siswa')}}">Siswa</a>
           <a class="btn-li my-2" href="{{url('/lihat-guru')}}">Guru</a>
        @elseif ($user->jenis_ptk == "Tenaga Administrasi Sekolah")
           <a class="btn btn-primary my-3" href="{{url('/reset-tahun-ajaran')}}" onclick="return confirm('Apakah Anda Yakin Ingin Memulai Ajaran Baru?')">Mulai Tahun Ajaran Baru</a>
           <a class="btn-li my-2" href="{{url('/ledger?tahun_ajaran=2021/2022&kode_rombel=1')}}">Lihat Ledger</a>
           <b class=" my-2">Kelola Data</b>
           <a class="btn-li my-2" href="{{url('/kelas')}}">Kelas</a>
           <a class="btn-li my-2" href="{{url('/mapel')}}">Mapel</a>
           <a class="btn-li my-2" href="{{url('/beban')}}">Beban Ajar</a>
           <a class="btn-li my-2" href="{{url('/siswa')}}">Siswa</a>
           <a class="btn-li my-2" href="{{url('/kelola-guru')}}">Guru</a>
       @endif
    @else
        <a class="btn-li my-2" href="{{url('/lihat-nilai?semester=1')}}">Lihat Nilai</a>
    @endif
    
   <a href="{{url('/profile')}}" class="btn-li my-2">Profile</a>
   <a href="{{url('/logout')}}" class="btn-li my-2">Keluar</a>
</ul>