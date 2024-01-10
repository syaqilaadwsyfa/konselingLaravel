<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $fillable =  [
        'nis',
        'nama',
        'alamat',
        'kelas_id',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp_ortu',
        'agama',
        'tahun_angkatan',
        'user_id',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id', 'kelas_id');
    }

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }

    public function konseling()
    {
        return $this->hasMany(Konseling::class);
    }
}
