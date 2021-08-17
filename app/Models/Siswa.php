<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $table = "siswa";
    protected $primaryKey = 'nis';
    protected $fillable = [
        'nama', 
        'id_kelas', 
        'alamat', 
        'nomor', 
        'ttl', 
        'email'
    ];
}
