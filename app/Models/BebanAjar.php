<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BebanAjar extends Model
{
    use HasFactory;
    public $table = "beban_ajar";
    protected $fillable = [
        'nuptk', 
        'id_mapel', 
        'id_kelas'
    ];
}
