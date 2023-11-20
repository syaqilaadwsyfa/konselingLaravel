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
        'pelanggaran',
        'catatan',
        'tgl_pelanggaran',
        'tindakan'
    ];

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'id', 'siswa_id');
    }
}
