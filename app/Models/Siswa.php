<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use HasFactory;
    public $table = "siswa";
    public $incrementing = false;
    protected $guard = 'siswa';
    public $primaryKey = 'nis';
    protected $fillable = [
        'nama', 
        'id_kelas', 
        'alamat', 
        'nomor', 
        'ttl', 
        'email'
    ];
    protected $hidden = [
        'password', 
    ];

    public function getAuthPassword()
    {
     return $this->password;
    }
}
