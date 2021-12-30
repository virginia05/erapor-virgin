<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public $table = "kelas";
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'kode_rombel', 
        'nuptk', 
        'nama_kelas', 
    ];



}
