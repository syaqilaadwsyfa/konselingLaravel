<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggaran;

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggarans = [
            [
                'siswa_id' => 1,
                'guruBk_id' => 1,
                'pelanggaran' => 'bolos',
                'catatan' => 'bolos malah main air',
                'tgl_pelanggaran' => '2023-12-12',
                'tindakan' => 'dihukum',
            ],
            [
                'siswa_id' => 2,
                'guruBk_id' => 1,
                'pelanggaran' => 'alfa',
                'catatan' => 'alfa 3 hari berturut-turut',
                'tgl_pelanggaran' => '2023-12-12',
                'tindakan' => 'panggil ortu',
            ],
        ];

        foreach($pelanggarans as $key => $value) {
            Pelanggaran::create($value);
        }
    }
}
