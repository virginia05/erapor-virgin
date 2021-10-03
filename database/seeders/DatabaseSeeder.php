<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->insert([
            'kode_guru' => '1',
            'nuptk' => '56748651300023',
            'nama' => 'Dahmurti',
            'gender' => 'Perempuan',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'tgl_lahir' => '1970-07-24',
            'alamat' => 'Gg. Manggis RT 06/01',
            'status_pegawai' => 'GTY/PTY',
            'jenis_ptk' => 'Guru Mapel',
            'gelar' => 'S.E., M.M.',
            'sertifikasi' => 'Ekonomi',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '1',
            'nama_rombel' => "10",
            'jurusan' => 'MM',
            'kategori_mapel' => json_encode([
            'Pendidikan Agama dan Budi Pekerti','BTQ','PPKn','Bahasa Indonesia','Matematika','Bahasa Inggris','Seni Budaya','Sejarah Indonesia','PJOK' ,'Kimia','Fisika','Pemrograman Dasar','Komputer dan Jaringan Dasar','Simulasi dan Komunikasi Digital','Sistem Komputer','Dasar Design Grafis' ,'Bahasa Sunda',
],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '2',
            'nama_rombel' => "11",
            'jurusan' => 'MM',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","PPKn","Bahasa Indonesia","Matematika","Bahasa Inggris","PJOK","Teknik Pengelolaan Audio Video","Produk Kreatifitas & Kewirausahaan","Design Grafis","Animasi 2D & 3D","Desain Media Interaktif"],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '3',
            'nama_rombel' => "12",
            'jurusan' => 'MM',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '4',
            'nama_rombel' => "10",
            'jurusan' => 'AKL',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","BTQ","PPKn","Bahasa Indonesia","Matematika","Bahasa Inggris","Seni Budaya","Sejarah Indonesia","PJOK","Perbankan Dasar","Administrasi Umum","Ekonomi Bisnis","IPA","Simulasi dan Komunikasi Digital","Aplikasi Pengolahan Angka/Spreadsheet","Akuntansi Dasar","Etika Profesi","Bahasa Sunda"],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '5',
            'nama_rombel' => "11",
            'jurusan' => 'AKL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '6',
            'nama_rombel' => "12",
            'jurusan' => 'AKL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '7',
            'nama_rombel' => "10",
            'jurusan' => 'BDP',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","BTQ","PPKn","Bahasa Indonesia","Matematika","Seni Budaya","Sejarah Indonesia","PJOK","Komunikasi Bisnis","Administrasi Umum","Ekonomi Bisnis","IPA","Simulasi dan Komunikasi Digital","Perencanaan Bisnis","Perencanaan Bisnis","Bahasa Sunda"],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '8',
            'nama_rombel' => "11",
            'jurusan' => 'BDP',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '9',
            'nama_rombel' => "12",
            'jurusan' => 'BDP',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","PPKn","Bahasa Indonesia","Matematika","Bahasa Inggris","Pengelolaan Bisnis Ritel","Penataan Produk","Bisnis Online","Administrasi Transaksi"],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '10',
            'nama_rombel' => "10",
            'jurusan' => 'OTKP',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","BTQ","PPKn","Bahasa Indonesia","Matematika","Inggris","Bahasa","Seni Budaya","Sejarah Indonesia","PJOK","Administrasi Umum","Ekonomi Bisnis","IPA","Simulasi dan Komunikasi Digital","Teknologi Perkantoran","Korespondensi","Kearsipan","Bahasa Sunda"],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '11',
            'nama_rombel' => "11",
            'jurusan' => 'OTKP',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","PPKn","Bahasa Indonesia","Matematika","Bahasa Inggris","PJOK","Produk Kreatifitas & Kewirausahaan","Otomatisasi Tata Kelola Kepegawaian XI","Otomatisasi Tata Kelola Keuangan","Otomatisasi Tata Kelola Humas & Protokoler XI","Otomatisasi Tata Kelola Sarana & Prasarana"] ,JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '12',
            'nama_rombel' => "12",
            'jurusan' => 'OTKP',
            'kategori_mapel' => json_encode(["Pendidikan Agama dan Budi Pekerti","PPKn","Bahasa Indonesia","Matematika","Bahasa Inggris","Produk Kreatifitas & Kewirausahaan","Otomatisasi Tata Kelola Humas & Protokoler","Otomatisasi Tata Kelola Kepegawaian XII","Otomatisasi Tata Kelola Keuangan","Otomatisasi Tata Kelola Sarana & Prasarana XII"],JSON_FORCE_OBJECT),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        

        DB::table('mapel')->insert([
            'nama_mapel' => 'Matematika',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'Bahasa Indonesia',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'Bahasa Inggris',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'PPKn',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'BTQ',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'Seni Budaya',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


         DB::table('mapel')->insert([
            'nama_mapel' => 'Sejarah Indonesia',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'PJOK',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Ekonomi Bisnis ',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Administrasi Umum',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Komunikasi Bisnis',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Perbankan Dasar',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'IPA',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Kimia',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Fisika',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Simulasi dan Komunikasi Digital',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Komputer dan Jaringan Dasar',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Pemrograman Dasar',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Teknologi Perkantoran',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Sistem Komputer',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Dasar Design Grafis',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Teknik Pengelolaan Audio Video',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Produk Kreatifitas & Kewirausahaan',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Humas & Protokoler',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Korespondensi',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Kearsipan',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Kepegawaian XI',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Kepegawaian XII',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Keuangan',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Aplikasi Pengolahan Angka/Spreadsheet',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Humas & Protokoler XI',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Sarana & Prasarana XII',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Otomatisasi Tata Kelola Sarana & Prasarana',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Pengelolaan Bisnis Ritel',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Perencanaan Bisnis',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Penataan Produk',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Bisnis Online',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'Akuntansi Dasar',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Perencanaan Bisnis',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Administrasi Transaksi',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Etika Profesi',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         DB::table('mapel')->insert([
            'nama_mapel' => 'Bahasa Sunda',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'nama_mapel' => 'Design Grafis',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

          DB::table('mapel')->insert([
            'nama_mapel' => 'Animasi 2D & 3D',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

           DB::table('mapel')->insert([
            'nama_mapel' => 'Desain Media Interaktif',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('guru')->insert([
            'kode_guru' => '2',
            'nuptk' => '123456',
            'nama' => 'Fikri Dwiyansyah',
            'gender' => 'Laki-Laki',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'tgl_lahir' => '1988-03-19',
            'alamat' => 'Jakarta',
            'status_pegawai' => 'Tenaga Honor Sekolah',
            'jenis_ptk' => 'Tenaga Administrasi Sekolah',
            'gelar' => '',
            'sertifikasi' => '',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('guru')->insert([
            'kode_guru' => '3',
            'nuptk' => '135775465620040',
            'nama' => 'Nana Maulana',
            'gender' => 'Laki-Laki',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'tgl_lahir' => '1976-10-23',
            'alamat' => 'jati Waru RT 05/05',
            'status_pegawai' => 'GTY/PTY',
            'jenis_ptk' => 'Kepala Sekolah',
            'gelar' => 'S1',
            'sertifikasi' => 'Matematika',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

           DB::table('kelas')->insert([
            'kode_rombel' => '1',
            'kode_guru'=>  '2',   
            'nama_kelas'=> 'Belum Ada Kelas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'kode_rombel' => '1',
            'kode_guru'=>  '1',   
            'nama_kelas'=> '10 MM 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'kode_rombel' => '1',
            'kode_guru'=>  '1',   
            'nama_kelas'=> '10 MM 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


         DB::table('siswa')->insert([
            'nis' => '3041520541',
            'nama' => 'Adinda Ayu Pratiwi   ',
            'gender' => 'Perempuan',
            'nama_ibu' => 'Ermanisah',
            'id_kelas' => '1',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'alamat' => '-',
            'ttl' => '2004-07-06',
            'tahun_mulai' => date('Y')."/".date('Y',strtotime('+1 year')),
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '0044638773',
            'nama' => 'Alfiqo Gusti Ramadhani',
            'gender' => 'Laki-Laki',
            'nama_ibu' => 'Lia Kustani',
            'id_kelas' => '2',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'alamat' => '-',
            'tahun_mulai' => date('Y')."/".date('Y',strtotime('+1 year')),
            'ttl' => '2004-10-09',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         

         DB::table('siswa')->insert([
            'nis' => '3054545120',
            'nama' => 'Alifia Rhadiyah Rimansyah',
            'gender' => 'Perempuan',
            'nama_ibu' => 'Siti Ambariah',
            'id_kelas' => '3',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'alamat' => '-',
            'tahun_mulai' => date('Y')."/".date('Y',strtotime('+1 year')),
            'ttl' => '2005-04-09',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '3051509385',
            'nama' => 'Amelia Niswatun Zaroh',
            'gender' => 'Perempuan',
            'nama_ibu' => 'Kusri',
            'id_kelas' => '2',
            'nomor' => 0,
            'email' => 'user@mailnesia.com',
            'alamat' => '-',
            'tahun_mulai' => date('Y')."/".date('Y',strtotime('+1 year')),
            'ttl' => '2005-02-21',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('beban_ajar')->insert([
            'kode_guru' => '1',
            'id_kelas' => 2,
            'id_mapel' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('beban_ajar')->insert([
            'kode_guru' => '1',
            'id_kelas' => 2,
            'id_mapel' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
