<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    public $table = "tugas";
    // protected $primaryKey = 'id';    
    protected $fillable = [
        'keterangan', 
        'kode_mapel', 
        'nis', 
        'id_pengetahuan', 
        'nomor', 
        'nilai'
    ];
}
