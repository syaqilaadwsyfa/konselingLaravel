<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru_BK extends Model
{
    use HasFactory;

    protected $table = 'guru_bks';
    protected $fillable =  [
        'nip',
        'nama',
        'no_telp',
    ];
}
