<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table    = 'pelanggarans';
    protected $fillable =  [
        'siswa_id',
        'guruBk_id',
        'pelanggaran',
        'catatan',
        'tgl_pelanggaran',
        'tindakan'
    ];

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id', 'siswa_id');
    }
    public function guruBk() {
        return $this->hasMany(Guru_BK::class, 'id', 'guruBk_id');
    }
}
