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
        // \App\Models\User::factory(10)->create();
        DB::table('rombel')->insert([
            'kode_rombel' => '1',
            'nama_rombel' => "10 MM",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '2',
            'nama_rombel' => "11 MM",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rombel')->insert([
            'kode_rombel' => '3',
            'nama_rombel' => "12 MM",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('mapel')->insert([
            'kode_mapel' => '1',
            'nama_mapel' => 'MTK',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mapel')->insert([
            'kode_mapel' => '2',
            'nama_mapel' => 'Agama',
            'KKM' => '75',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '1001',
            'nama' => 'daniel',
            'kode_rombel' => '1',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'alamat' => 'bogor',
            'kode_kelas' => 'MM1',
            'ttl' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '1002',
            'nama' => 'jones',
            'kode_rombel' => '1',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'alamat' => 'bogor',
            'kode_kelas' => 'MM1',
            'ttl' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '1003',
            'nama' => 'jon',
            'kode_rombel' => '1',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'alamat' => 'bogor',
            'kode_kelas' => 'MM1',
            'ttl' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '1004',
            'nama' => 'lalo',
            'kode_rombel' => '2',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'alamat' => 'bogor',
            'kode_kelas' => 'MM1',
            'ttl' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('siswa')->insert([
            'nis' => '1005',
            'nama' => 'lele',
            'kode_rombel' => '2',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'alamat' => 'bogor',
            'kode_kelas' => 'MM1',
            'ttl' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('nilai')->insert([
            'kode_mapel' => '1',
            'nis' => '1001',
            'semester' => '1',
            'UTS' => '0',
            'UAS' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('nilai')->insert([
            'kode_mapel' => '1',
            'nis' => '1002',
            'semester' => '1',
            'UTS' => '0',
            'UAS' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('nilai')->insert([
            'kode_mapel' => '1',
            'nis' => '1003',
            'semester' => '1',
            'UTS' => '0',
            'UAS' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('nilai')->insert([
            'kode_mapel' => '2',
            'nis' => '1004',
            'semester' => '3',
            'UTS' => '0',
            'UAS' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('nilai')->insert([
            'kode_mapel' => '2',
            'nis' => '1005',
            'semester' => '3',
            'UTS' => '0',
            'UAS' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('guru')->insert([
            'id_guru' => '1',
            'nama' => 'rini',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'ttl' => 'bogor',
            'alamat' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('guru')->insert([
            'id_guru' => '2',
            'nama' => 'Joko',
            'nomor' => 888888888,
            'email' => 'user@mailnesia.com',
            'ttl' => 'bogor',
            'alamat' => 'bogor',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mengajar')->insert([
            'id_guru' => '1',
            'kode_rombel' => '1',
            'kode_mapel' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('mengajar')->insert([
            'id_guru' => '2',
            'kode_rombel' => '1',
            'kode_mapel' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
