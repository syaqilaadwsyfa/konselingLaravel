<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;
    protected $table = 'konselings';
    protected $fillable = [
        'siswa_id',
        'guruBk_id',
        'tgl_konseling',
        'keluhan',
        'hasil_konseling',
        'status',
    ];

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id', 'siswa_id');
    }

    public function guruBk() {
        return $this->hasMany(Guru_BK::class, 'id', 'guruBk_id');
    }
}
