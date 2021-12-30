<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Guru extends Model
class Guru extends Authenticatable
{
    use HasFactory;
    protected $table = 'guru';
    protected $guard = 'guru';
    protected $primaryKey = 'nuptk';
    // protected $fillable = ['username', 'password'];
    protected $hidden = [
        'password', 
        'remember_token'
    ];

    public function getAuthPassword()
    {
     return $this->password;
    }
}
