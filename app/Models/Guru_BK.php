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
        'user_id'
    ];

    public function konseling() {
        return $this->hasMany(Konseling::class);
    }

    public function pelanggaran() {
        return $this->hasMany(Pelanggaran::class);
    }

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
