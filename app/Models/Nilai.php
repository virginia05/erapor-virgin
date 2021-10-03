<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    public $table = "nilai";

    protected $fillable = [
        'id_mapel',
        'nis',
        'nis',
        'id_mapel',
        'tahun_ajaran',
        'semester',
        'UTS',
        'UAS',
        'pengetahuan',
        'keterampilan',
        'sikap',
        'jumlah'
    ];
}
