<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $fillable =  [
        'nis',
        'nama',
        'alamat',
        'kelas',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp_ortu',
        'agama',
        'tahun_angkatan',
    ];

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id', 'siswa_id');
    }
}
