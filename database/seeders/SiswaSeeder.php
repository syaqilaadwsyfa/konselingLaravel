<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswas = [
            [
                'nis' => 222222,
                'nama' => 'Siswa',
                'alamat' => 'Neskar',
                'kelas_id' => 2,
                'tgl_lahir' => '2007-10-11',
                'jenis_kelamin' => 'perempuan',
                'no_telp_ortu' => '22001111',
                'agama' => 'islam',
                'tahun_angkatan' => 2025,
                'user_id' => 3,
            ],
            [
                'nis' => 191991,
                'nama' => 'Syaqila',
                'alamat' => 'jojo banh',
                'kelas_id' => 3,
                'tgl_lahir' => '2005-08-20',
                'jenis_kelamin' => 'perempuan',
                'no_telp_ortu' => '07070707',
                'agama' => 'islam',
                'tahun_angkatan' => 2024,
                'user_id' => 4,
            ],
            [
                'nis' => 708090,
                'nama' => 'Rafi',
                'alamat' => 'calon jojo banh',
                'kelas_id' => 3,
                'tgl_lahir' => '2006-01-27',
                'jenis_kelamin' => 'laki-laki',
                'no_telp_ortu' => '08080808',
                'agama' => 'islam',
                'tahun_angkatan' => 2024,
                'user_id' => 5,
            ],
        ];
        foreach($siswas as $key => $value) {
            Siswa::create($value);
        }
    }
}
