<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = "mengajar";
    // protected $primaryKey = 'nis';
    protected $fillable = [
        'id_guru', 
        'kode_mapel', 
        'kode_rombel'
    ];
}
